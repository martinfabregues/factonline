<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Factura extends Eloquent {

	protected $table = 'facturas';

	protected $guarded = array('id');	
	
	public $timestamps = false;
        
        public function TipoComprobante()
        {
            return $this->belongsTo('TipoComprobante', 'tipocomprobante_id', 'id');
        }
}
