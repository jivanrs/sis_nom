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
		        ->leftJoin('empresa', 'empresa.idEmpresa', '=', 'empleado.pag_idEmpresa_FK')
		        ->leftJoin('departamento', 'departamento.idDepartamento', '=', 'pagos.pag_idDepartamento_FK')
		        ->leftJoin('periodo', 'periodo.idPeriodo', '=', 'pagos.pag_idPeriodo_FK')
		        ->leftJoin('recibos', 'recibos.idRecibos', '=', 'pagos.pag_idRecibos_FK')
		        ->get();

        return $pagos;
	}
	

}





?>