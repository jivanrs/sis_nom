<?php

class Empresa extends Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'empresa';

	/**
	 * There is no timestamp on this table
	 *
	 * @var bool
	 */
	
	public $timestamps = false;

	protected $primaryKey = "idEmpresa";


}


?>