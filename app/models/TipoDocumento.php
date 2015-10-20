<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class TipoDocumento extends Eloquent {

	protected $table = 'tiposdocumento';

	protected $guarded = array('id');	
        
        protected $fillable = array('tipo_documento', 'codigoafip', 'activo');
	
	public $timestamps = false;
}
