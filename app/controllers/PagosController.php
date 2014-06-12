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

		return View::make("pagos")->with('empleados', $empleados);
		
	}

	public function generarNomina(){

		$idEmpleados = DB::table('empleado')->lists('idEmpleado');

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

		return Redirect::to("/pagos");

	}

	public function generarReciboEspecial(){

		$idEmpleados = Input::get('idEmpleados');

		if(is_array($idEmpleados))
		{

			foreach ($idEmpleados as $id) {

				$Empleado = Empleado::where('idEmpleado', $id)->first();
				$PorPagar = Input::get('Pago');
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
				$Recibos->TipoDeRecibo			= 	1;
				$Recibos->Monto 				=   $PorPagar;
				$Recibos->Comision				= 	$PorPagar * ($PorComision / 100);
				$Recibos->CPorPagar				= 	$PorPagar * ($PorComision / 100);
				$Recibos->save();	

			}

		}

		return Redirect::to("/pagos");

	}

	public function mostrarPorPagar(){
		
		$id = Input::get('id');

		$recibo = Recibos::where('idRecibos', $id)->first();

		return $recibo->PorPagar;

	}

	public function realizarPago(){

		$recibos = Recibos::where('idRecibos', Input::get('recibo_id'))->first();
		$Deuda = $recibos->PorPagar;
		$Comision = $recibos->Comision;
		$recibos->PorPagar = $Deuda - Input::get('Pago');
		$recibos->CPorPagar = $Comision - ($Comision / ($PorPagar / Input::get('Pago')));
		$recibos->save();

		$pago = new Pagos;

		$pago->Pago = Input::get('Pago');
		$pago->FechaDePago = date('Y/m/d H:i:s');
		$pago->pag_idRecibos_FK = Input::get('recibo_id');

		$pago->save();

		return Redirect::to("/pagos");

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
