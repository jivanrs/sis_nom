<?php

class Recibos extends Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'recibos';

	/**
	 * There is no timestamp on this table
	 *
	 * @var bool
	 */
	
	public $timestamps = false;

	protected $primaryKey = "idRecibos";


}


?>