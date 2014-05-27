<?php

class empleados extends Eloquent 
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'empleado';

	/**
	 * There is no timestamp on this table
	 *
	 * @var bool
	 */
	public $timestamps = false;

	public function getEmpleadosInfo()
	{
		
		DB::table('empleado')
		        ->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->get();

        return $empleados;
	}
	

}





?>