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
		        ->leftJoin(
		        	DB::table('recibos')
		        	->leftJoin('empleado', 'empleado.idEmpleado', '=', 'recibos.rec_idEmpleado_FK')
		        	->select(DB::raw('idRecibos, rec_idEmpleado_FK, SUM(SueldoBase) as Restante'))
		        	->groupBy('rec_idEmpleado_FK')
		        	->get()
		        	,'recibos', 'recibos.rec_idEmpleado_FK', '=', 'empleado.idEmpleado')
		        ->select('idEmpleado', 'Nombre', 'Nombre_Depto', 'Nombre_Empresa', 'Puesto', 'SueldoBase', 'Restante')
		        ->get();
;

        return $pagos;
	}
	

}





?>