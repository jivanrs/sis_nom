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

		if(is_array($empleados))
		{

			foreach ($idEmpleados as $id) {

				$Recibos = new Recibos;
				
				$Recibos->FechaDeRecibo 		= 	date('Y/m/d H:i:s');
				$Recibos->rec_idPeriodo_FK		= 	Input::get('rec_idPeriodo_FK');
				$Recibos->rec_idEmpleado_FK		= 	Input::get('rec_idEmpleado_FK');
				$Recibos->PorPagar				= 	Input::get('PorPagar');
				$Recibos->save();	

			}

		}

		return Redirect::to("/Recibos");

	}

	public function realisarPago($idEmpleado){

		$recibo = Recibos::where('rec_idEmpleado_FK', $idEmpleado)->first();
		$idRecibo = $recibo->idRecibos;
		$recibo->PorPagar = $recibo->PorPagar - Input::get('Pago');
		$recibo->rec_idPeriodo_FK = Input::get('idPeriodo');
		$recibo->save();

		$Pago = new Pagos;

		$Pago->Pago 				= Input::get('Pago');
		$Pago->FechaDePago 			= date('Y/m/d H:i:s');
		$Pago->pag_idEmpleado_FK	= $idEmpleado;
		$Pago->pag_idRecibos_FK 	= $idRecibo;
		$Pago->PagoEspaecial 		= 0;
		$Pago->save();

		return Redirect::to("/Recibos");

	}

	public function realisarPagoEspecial($idEmpleado){

		$Pago = new Pagos;

		$Pago->Pago 					= Input::get('Pago');
		$Pago->FechaDePago 				= date('Y/m/d H:i:s');
		$Pago->pag_idEmpleado_FK 		= $idEmpleado;
		$Pago->PagoEspaecial			= 1;
		$Pago->save();

		return Redirect::to("/Recibos");

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
