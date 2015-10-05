<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class PuntoVenta extends Eloquent {

	protected $table = 'puntosdeventa';

	protected $guarded = array('id');
	
	protected $fillable = array('nombre', 'direccion', 'numero', 'departamento', 'piso', 'barrio', 'codigoafip', 'activo');
	
	public $timestamps = false;
}
