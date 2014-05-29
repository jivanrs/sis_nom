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
		        ->get();

		 /*DB::table('users')
        ->select('first_name', 'TotalCatches.*')

        ->leftjoin(DB::raw('SELECT rec_idEmpleado_FK, SUM( SueldoBase ) AS Restante
						FROM `recibos`
						INNER JOIN empleado ON rec_idEmpleado_FK = idEmpleado
						GROUP BY rec_idEmpleado_FK'), 
        				function($join)
				        {
				            $join->on('idEmpleado', '=', 'rec_idEmpleado_FK');
				        })
        ->orderBy('TotalCatches.CatchesPerDay', 'DESC')
        ->get();

        DB::table('recibos')
		        	->leftJoin('empleado', 'empleado.idEmpleado', '=', 'recibos.rec_idEmpleado_FK')
		        	->select(DB::raw('rec_idEmpleado_FK, SUM(SueldoBase) as Restante'))
		        	->groupBy('rec_idEmpleado_FK')
		        	->get()
		        	,'recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')

		DB::table('users')
        ->select('first_name', 'TotalCatches.*')

        ->join(DB::raw('(SELECT user_id, COUNT(user_id) TotalCatch, DATEDIFF(NOW(), MIN(created_at)) Days, COUNT(user_id)/DATEDIFF(NOW(), MIN(created_at)) CatchesPerDay FROM `catch-text` GROUP BY user_id) TotalCatches'), function($join)
        {
            $join->on('users.id', '=', 'TotalCatches.user_id');
        })
        ->orderBy('TotalCatches.CatchesPerDay', 'DESC')
        ->get();*/

        return $pagos;
	}
	

}





?>