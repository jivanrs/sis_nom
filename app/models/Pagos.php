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
		        		DB::raw('(SELECT rec_idEmpleado_FK, SUM( SueldoBase ) AS Restante
						FROM `recibos`
						INNER JOIN empleado ON rec_idEmpleado_FK = idEmpleado
						GROUP BY rec_idEmpleado_FK) AS recibos1'), 
        				function($join)
				        {
				            $join->on('idEmpleado', '=', 'rec_idEmpleado_FK');
				        })
		        ->select('idEmpleado', 'Nombre', 'Nombre_Depto', 'Nombre_Empresa', 'Puesto', 'SueldoBase', 'Restante')
		        ->where('Activo', true)
		        ->get();

        return $pagos;
	}
	

}





?>