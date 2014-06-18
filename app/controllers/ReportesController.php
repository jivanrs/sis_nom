<?php

class ReportesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$empleados = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('pagos', 'pagos.pag_idRecibos_FK', '=', 'recibos.idRecibos')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->whereBetween('FechaDeRecibo', array('2013-03-05', '2015-06-15'))
		        ->select('idEmpleado', 'TipoPeriodo', 'Nombre', 'Nombre_Empresa', 'Nombre_Depto',  'FechaDePago', 'Pago', 'FechaDeRecibo', 'Monto', 
		        	'PorPagar', 'Periodo', 'TipoDeRecibo')
		        ->orderBy('Nombre', 'desc')
		        ->get();

		$total = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('pagos', 'pagos.pag_idRecibos_FK', '=', 'recibos.idRecibos')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->whereBetween('FechaDeRecibo', array('2013-03-05', '2015-06-15'))
		        ->select('Nombre', DB::Raw('SUM(PorPagar) as Restante'), DB::Raw('SUM(Pago) as Pagado'))
		        ->groupBy('Nombre')
		        ->orderBy('Nombre', 'desc')
		        ->get();

		return View::make("reportes")->with('empleados', $empleados)->with('total', $total);
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
