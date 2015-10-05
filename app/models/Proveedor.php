<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Proveedor extends Eloquent {

	protected $table = 'proveedores';

	protected $guarded = array('id');
	
	protected $fillable = array('nombre', 'cuit', 'ingresosbrutos', 'ciudad_id', 'localidad_id', 
						'direccion', 'numero', 'piso', 'departamento', 'barrio', 'codigopostal', 
						'telefono', 'email', 'activo');
	
	public $timestamps = false;
}
