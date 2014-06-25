<?php

class PagosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$empleados = Pagos::PagosInfo();

		$ultimaFecha = DB::table('Recibos')
				->where('TipoDeRecibo', 0)
		        ->select('FechaDeRecibo')
		        ->orderBy('FechaDeRecibo', 'desc')
		        ->get();

		return View::make("pagos")->with('empleados', $empleados)->with('ultimaFecha', $ultimaFecha[0]->FechaDeRecibo);
	
		
	}
	public function bonos()
	{

		$empleados = Pagos::BonosInfo();

		return View::make("bonos")->with('empleados', $empleados);
	
		
	}

	public function generarNomina(){

		$idEmpleados = DB::table('empleado')->where('Activo', 1)->lists('idEmpleado');

		if(is_array($idEmpleados))
		{

			foreach ($idEmpleados as $id) {

				$Empleado = Empleado::where('idEmpleado', $id)->first();
				$PorPagar = $Empleado->SueldoBase / 2;
				$EmpleadoT = DB::table('empleado')
		        ->leftJoin('empadministradora', 'empadministradora.idEmpAdministradora', '=', 'empleado.emp_idEmpAdministradora_FK')
		        ->select('*')
		        ->where('idEmpleado', $id)
		        ->where('Activo', true)
		        ->first();

				$PorComision = $EmpleadoT->PorComision;

				$Recibos = new Recibos;
				
				$Recibos->FechaDeRecibo 		= 	date('Y/m/d H:i:s');
				if (date('d') > 15) {
					$Recibos->rec_idPeriodo_FK	= 	2;
				}
				else{
					$Recibos->rec_idPeriodo_FK	= 	1;
				}
				$Recibos->rec_idEmpleado_FK		= 	$id;
				$Recibos->PorPagar				= 	$PorPagar;
				$Recibos->TipoDeRecibo			= 	0;
				$Recibos->Monto 				=   $PorPagar;
				$Recibos->Comision				= 	$PorPagar * ($PorComision / 100);
				$Recibos->CPorPagar				= 	$PorPagar * ($PorComision / 100);
				$Recibos->save();	

			}

		}

		$empleados = Pagos::PagosInfo();

		$ultimaFecha = DB::table('Recibos')
		        ->select('FechaDeRecibo')
		        ->orderBy('FechaDeRecibo', 'desc')
		        ->get();

		return View::make("pagos")->with('empleados', $empleados)->with('ultimaFecha', $ultimaFecha[0]->FechaDeRecibo);

	}

	public function generarPagoBono(){

		//Recibo
		$recibo_id = Input::get('recibo_id');
		$recibo  = Recibos::where('idRecibos', $recibo_id)->first();
		$recibo->ConceptoBono = Input::get('ConceptoBono');
		$recibo->PorPagar = $recibo->PorPagar - (Input::get('Pago'));

		//Pago

		$pago_bono = new Pagos;
		$pago_bono->Pago = Input::get('Pago');
		$pago_bono->FechaDePago = date('Y/m/d H:i:s');
		$pago_bono->pag_idRecibos_FK = Input::get('recibo_id');
		$pago_bono->Comision = $recibo->Comision;
		$pago_bono->IVA = ($recibo->Comision + Input::get('Pago')) * 0.16;		

		$recibo->save();
		$pago_bono->save();


		return Redirect::to("/bonos");

	}

	public function generarReciboBono(){

		$Empleado = Empleado::where('idEmpleado', Input::get('empleado_id_bono'))->first();
			$EmpleadoT = DB::table('empleado')
	        ->leftJoin('empadministradora', 'empadministradora.idEmpAdministradora', '=', 'empleado.emp_idEmpAdministradora_FK')
	        ->select('*')
	        ->where('idEmpleado', Input::get('empleado_id_bono'))
	        ->where('Activo', true)
	        ->first();
			$PorComision = $EmpleadoT->PorComision;

			$Recibos = new Recibos;
			
			$Recibos->FechaDeRecibo 		= 	date('Y/m/d H:i:s');
			$Recibos->rec_idEmpleado_FK		= 	Input::get('empleado_id_bono');
			$Recibos->PorPagar				= 	Input::get('Pago_bono');
			$Recibos->rec_idPeriodo_FK      =   1;
			$Recibos->TipoDeRecibo			= 	1;
			$Recibos->Monto 				=   Input::get('Pago_bono');
			$Recibos->ConceptoBono          =   Input::get('ConceptoBono');
			$Recibos->Comision				= 	Input::get('Pago_bono') * ($PorComision / 100);
			$Recibos->CPorPagar				= 	Input::get('Pago_bono') * ($PorComision / 100);

			$Recibos->save();			

		$empleados = Pagos::BonosInfo();
		return View::make("bonos")->with('empleados', $empleados);

	}


	public function mostrarPorPagar($id){
		
		$recibos = Recibos::where('rec_idEmpleado_FK', $id)
                        ->where('PorPagar', '!=', ' 0')->where('TipoDeRecibo', '=', '0')->get();

        return $recibos;
    }

    public function mostrarPorPagarBono($id){
		
		$recibos = Recibos::where('rec_idEmpleado_FK', $id)
                        ->where('PorPagar', '!=', ' 0')->where('TipoDeRecibo', '=', '1')->get();

        return $recibos;

	}

	public function realizarPago(){

		$recibos = Recibos::where('idRecibos', Input::get('recibo_id'))->first();
		$Deuda = $recibos->PorPagar;
		$Comision = $recibos->Comision;
		$recibos->PorPagar = $Deuda - Input::get('Pago');
		$recibos->CPorPagar = $Comision - ($Comision / ($Deuda / Input::get('Pago')));
		$recibos->save();

		$pago = new Pagos;

		$pago->Pago = Input::get('Pago');
		$pago->FechaDePago = date('Y/m/d H:i:s');
		$pago->pag_idRecibos_FK = Input::get('recibo_id');
		$Com = $Comision / ($Deuda / Input::get('Pago'));
		$pago->Comision = $Com;
		$pago->IVA = ($Com + Input::get('Pago')) * 0.16;

		$pago->save();

		return Redirect::to("/pagos");

	}

	public function datosPago($id){

		$empleados = DB::table('empleado')
		        ->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->select('idEmpleado','Nombre', 'Nombre_Depto', 'Nombre_Empresa', 'SueldoBase')
		        ->where('Activo', true)
		        ->where('idEmpleado', $id)
		        ->get();

		return $empleados;
	}

	public function hacer_pago($id_empleado){

		$empleado = Empleado::find($id_empleado); 
		return View::make('pagos', array('empleado' => $empleado)); 

	}

	public function pago_empleado(){

		// return Input::all();
		$empleado = pagos::where('idEmpleado',Input::get('idEmpleado'))->first();
		$empleado->emp_idDeparameto_FK 		= 	Input::get('emp_idDeparameto_FK');	
		$empleado->emp_idEmpresa_FK 		= 	Input::get('emp_idEmpresa_FK');
		$empleado->Nombre 					= 	Input::get('Nombre');
		$empleado->SueldoBase 				= 	Input::get('SueldoBase');
		$empleado->emp_idTipoPeriodo_FK 	= 	Input::get('emp_idTipoPeriodo_FK');

		$empleado->save();
		return Redirect::to("/pagos");	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
