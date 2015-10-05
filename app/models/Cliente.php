<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Cliente extends Eloquent {

	protected $table = 'clientes';

	protected $guarded = array('id');
	
	protected $fillable = array('apellido', 'nombres', 'fecharegistro', 'documento', 'tipodocumento_id', 'condicioniva_id', 
	'direccion', 'numero', 'piso', 'departamento', 'barrio', 'telefono', 'email', 'activo');
	
	public $timestamps = false;
}
