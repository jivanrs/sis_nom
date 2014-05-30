<?php

class TipoPeriodo extends Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tipoperiodo';

	/**
	 * There is no timestamp on this table
	 *
	 * @var bool
	 */
	
	public $timestamps = false;

	protected $primaryKey = "idTipoPeriodo";


}


?>