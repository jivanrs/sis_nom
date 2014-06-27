<?php

class ReportesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return View::make("reportes");
	}

	public function reporteEmpleados($fechaIni, $fechaFin)
	{
		
		$empleados = DB::table('empleado')
				->set('SET lc_time_names = "es_ES";')	
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('pagos', 'pagos.pag_idRecibos_FK', '=', 'recibos.idRecibos')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        //->whereBetween('FechaDeRecibo', array('2013-03-05', '2015-06-15'))
		        ->select('idEmpleado', 'Nombre', 'Nombre_Empresa', 'Nombre_Depto',  'FechaDePago', 'Pago', 
		        	DB::Raw('Pagos.Comision as ComisionP'), 'IVA', DB::RAW('DATE_FORMAT(FechaDeRecibo,  "%M %Y") as FechaDeRecibo'), 'Monto', 'PorPagar', 'Periodo', 'TipoDeRecibo')
		        ->orderBy('Nombre', 'desc')
		        ->get();

		$total = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('pagos', 'pagos.pag_idRecibos_FK', '=', 'recibos.idRecibos')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        //->whereBetween('FechaDeRecibo', array($fechaIni, $fechaFin))
		        ->select('Nombre', DB::Raw('SUM(PorPagar) as Restante'), DB::Raw('SUM(Pago) as Pagado'), 
		        	DB::Raw('SUM(Pagos.Comision) as ComisionPT'), DB::Raw('SUM(IVA) as IVA'))
		        ->groupBy('Nombre')
		        ->orderBy('Nombre', 'desc')
		        ->get();

		return View::make("reportes")->with('empleados', $empleados)->with('total', $total);


	}

	public function reporteEmpresa($fechaIni, $fechaFin)
	{
		
		$listaEmpresa = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('pagos', 'pagos.pag_idRecibos_FK', '=', 'recibos.idRecibos')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->whereBetween('FechaDeRecibo', array($fechaIni, $fechaFin))
		        ->select('Nombre_Empresa', 'Nombre_Depto',  'FechaDePago', 'Pago', 'FechaDeRecibo', 'Monto', 
		        	'PorPagar', 'Periodo', 'TipoDeRecibo')
		        ->orderBy('Nombre_Empresa', 'desc')
		        ->get();

		$total = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('pagos', 'pagos.pag_idRecibos_FK', '=', 'recibos.idRecibos')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->whereBetween('FechaDeRecibo', array($fechaIni, $fechaFin))
		        ->select('Nombre_Empresa', DB::Raw('SUM(PorPagar) as Restante'), DB::Raw('SUM(Pago) as Pagado'))
		        ->groupBy('Nombre_Empresa')
		        ->orderBy('Nombre_Empresa', 'desc')
		        ->get();

		return View::make("reportes")->with('empresas', $listaEmpresa)->with('total', $total);

	}

	public function reporteDepto($fechaIni, $fechaFin)
	{
		
		$listaDepto = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('pagos', 'pagos.pag_idRecibos_FK', '=', 'recibos.idRecibos')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        //->whereBetween('FechaDeRecibo', array($fechaIni, $fechaFin))
		        ->select('Nombre_Empresa', 'Nombre_Depto',  'FechaDePago', 'Pago', 'FechaDeRecibo', 'Monto', 
		        	'PorPagar', 'Periodo', 'TipoDeRecibo')
		        ->orderBy('Nombre_Depto', 'desc')
		        ->orderBy('Nombre_Empresa', 'desc')
		        ->orderBy('PorPagar', 'desc')
		        ->get();

		$total = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('pagos', 'pagos.pag_idRecibos_FK', '=', 'recibos.idRecibos')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        //->whereBetween('FechaDeRecibo', array($fechaIni, $fechaFin))
		        ->select('Nombre_Depto', DB::Raw('SUM(PorPagar) as Restante'), DB::Raw('SUM(Pago) as Pagado'))
		        ->groupBy('Nombre_Depto')
		        ->orderBy('Nombre_Depto', 'desc')
		        ->get();

		return View::make("reportes")->with('departamentos', $listaDepto)->with('total', $total);
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
