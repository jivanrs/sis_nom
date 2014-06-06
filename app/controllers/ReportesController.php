<?php

class ReportesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$empleados = Pagos::ObtenerPagosEmpleados('2013-03-05', '2015-06-15');

		return View::make("reportes")->with('empleados', $empleados);
	}

	public function reporteEmpleados($fechaIni, $fechaFin)
	{
		
		$empleados = Pagos::ObtenerPagosEmpleados($fechaIni	, $fechaFin);

		return View::make("reportes")->with('empleados', $empleados);
	}

	public function reporteEmpresa($fechaIni, $fechaFin)
	{
		
		$empleados = Pagos::ObtenerPagosEmpresa($fechaIni, $fechaFin);

		return View::make("reportes")->with('empresa', $empleados);
	}

	public function reporteDepto($fechaIni, $fechaFin)
	{
		
		$empleados = Pagos::ObtenerPagosDepto($fechaIni, $fechaFin);

		return View::make("reportes")->with('departamento', $empleados);
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
