<?php

class Pagos extends Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pagos';

	/**
	 * There is no timestamp on this table
	 *
	 * @var bool
	 */
	public $timestamps = false;

	public function scopePagosInfo()
	{

		$pagos = DB::table('empleado')
		        ->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->leftjoin(
		        		DB::raw('(SELECT rec_idEmpleado_FK, SUM( PorPagar ) AS Restante
						FROM `recibos`
						INNER JOIN empleado ON rec_idEmpleado_FK = idEmpleado
						WHERE TipoDeRecibo = 0
						GROUP BY rec_idEmpleado_FK) AS recibos1'), 
        				function($join)
				        {
				            $join->on('idEmpleado', '=', 'rec_idEmpleado_FK');
				        })
		        ->select('idEmpleado', 'Nombre', 'Nombre_Depto', 'Nombre_Empresa', 'Puesto', 'SueldoBase', 'Restante','emp_idTipoPeriodo_FK', 'emp_idEmpresa_FK','emp_idDeparameto_FK')
		        ->orderBy('Restante', 'desc')
		        ->where('Activo', true)
		        //->whereNotNull('Restante') //Se puede usar para mostrar nada a mas a los que se les debe.
		        ->get();

        return $pagos;
	}

	public function scopeObtenerPagosEmpleados($fechaIni, $fechaFin){

		$listaEmpleados = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('pagos', 'pagos.pag_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('recibos', 'recibos.idRecibos', '=', 'pagos.pag_idRecibos_FK')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->whereBetween('FechaDeRecibo', array('2013-03-05', '2015-06-15'))
		        ->select('idEmpleado', 'TipoPeriodo', 'Nombre', 'Nombre_Empresa', 'Nombre_Depto',  'FechaDePago', 'Pago', 'FechaDeRecibo', 'Monto', 
		        	'PorPagar', 'Periodo', 'PagoEspecial')
		        ->orderBy('Nombre', 'desc')
		        ->get();

		return $listaEmpleados;

	}

	public function scopeObtenerPagosEmpresa($fechaIni, $fechaFin){

		$listaEmpresa = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('pagos', 'pagos.pag_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('recibos', 'recibos.idRecibos', '=', 'pagos.pag_idRecibos_FK')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->where('PagoEspecial', 0)
		        ->sum('pago')
		        ->groupBy('Nombre_Empresa')
		        ->whereBetween('FechaDePago', array($fechaIni, $fechaFin))
		        ->select('Nombre_Empresa', 'Nombre_Depto',  'FechaDePago', 'pago', 'FechaDeRecibo', 'Periodo')
		        ->get();

		return $listaEmpresa;

	}

	public function scopeObtenerPagosDepto($fechaIni, $fechaFin){

		$listaDepto = DB::table('empleado')
				->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('pagos', 'pagos.pag_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->leftJoin('recibos', 'recibos.idRecibos', '=', 'pagos.pag_idRecibos_FK')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'recibos.rec_idPeriodo_FK')
		        ->where('PagoEspecial', 0)
		        ->sum('pago')
		        ->groupBy('Nombre_Depto')
		        ->whereBetween('FechaDePago', array($fechaIni, $fechaFin))
		        ->select('Nombre_Empresa', 'Nombre_Depto',  'FechaDePago', 'pago', 'FechaDeRecibo', 'Periodo')
		        ->get();

		return $listaDepto;

	}
	

}





?>