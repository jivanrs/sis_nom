<?php

class PagosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make("pagos");
	}

	public function generarNomina(){

		foreach ($idEmpleados as $id) {

			$Recibos = new Recibos;

			// Template : $usuario->Nombre 	= 	Input::get('nombre');

			
			$Recibos->FechaDeRecibo 		= 	date('Y/m/d H:i:s');
			$Recibos->rec_idPeriodo_FK		= 	Input::get('rec_idPeriodo_FK');
			$Recibos->rec_idEmpleado_FK		= 	Input::get('rec_idEmpleado_FK');
			$Recibos->PorPagar				= 	Input::get('PorPagar');
			$Recibos->save();	

		}

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
