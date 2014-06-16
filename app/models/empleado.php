<?php

class Empleado extends Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'empleado';
	protected $primaryKey = "idEmpleado";

	/**
	 * There is no timestamp on this table
	 *
	 * @var bool
	 */
	public $timestamps = false;

	protected $guarded = array('id', 'idEmpleado');

	public function scopeEmpleadosInfo()
	{

		$empleados = DB::table('empleado')
		        ->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.emp_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'empleado.emp_idDeparameto_FK')
		        ->leftJoin('tipoperiodo', 'tipoperiodo.idTipoPeriodo', '=', 'empleado.emp_idTipoPeriodo_FK')
		        ->leftJoin('empadministradora', 'empadministradora.idEmpAdministradora', '=', 'empleado.emp_idEmpAdministradora_FK')
		        ->select('idEmpleado','Nombre', 'Nombre_Depto', 'Nombre_Empresa', 'EmpAdministradora', 'Puesto', 'SueldoBase', 'Email', 'Banco', 'Cta_Bancaria', 'CLABE_Bancaria')
		        ->where('Activo', true)
		        ->get();

        return $empleados;
	}

	public function DeleteEmpleado($ids)
	{
		foreach ($ids as $id) {

			DB::table('empleados')
            ->where('idEmpleado', $id)
            ->update(array('Activo' => 0));

		}

		return true;
	}
	

}





?>