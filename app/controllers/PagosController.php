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

		$idEmpleados = Input::get('empleados');

		if(is_array($idEmpleados))
		{

			foreach ($idEmpleados as $id) {

				$Empleado = Empleado::where('idEmpleado', $id)->first();
				$PorPagar = $Empleado->SueldoBase / 2;

				$Recibos = new Recibos;
				
				$Recibos->FechaDeRecibo 		= 	date('Y/m/d H:i:s');
				if (date('d') > 15) {
					$Recibos->rec_idPeriodo_FK		= 	2;
				}
				else{
					$Recibos->rec_idPeriodo_FK		= 	1;
				}
				$Recibos->rec_idEmpleado_FK		= 	$id;
				$Recibos->PorPagar				= 	$PorPagar;
				$Recibos->save();	

			}

		}

		return Redirect::to("/pagos");

	}

	public function realizarPago(){

		$recibos = Recibos::where('idRecibos', Input::get('recibo_id'))->first();
		$Deuda = $recibos->PorPagar;
		$recibos->PorPagar = $Deuda - Input::get('Pago');
		$recibos->save();

		$pago = new Pagos;

		$pago->Pago = Input::get('Pago');
		$pago->FechaDePago = date('Y/m/d H:i:s');
		$pago->pag_idEmpleado_FK = Input::get('empleado_id');
		$pago->PagoEspecial = Input::get('tipo_pago');
		$pago->pag_idRecibos_FK = Input::get('recibo_id');

		$pago->save();

		return Redirect::to("/pagos");

	}

	public function realizarPagoEspecial($idEmpleado){


		$Pago = new Pagos;

		$Pago->Pago 					= Input::get('Pago');
		$Pago->FechaDePago 				= date('Y/m/d H:i:s');
		$Pago->pag_idEmpleado_FK 		= $idEmpleado;
		$Pago->PagoEspaecial			= 1;
		$Pago->save();

		return Redirect::to("/Recibos");

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
