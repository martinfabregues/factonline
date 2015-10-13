<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class FacturaDetalle extends Eloquent {

	protected $table = 'facturasdetalle';

	protected $guarded = array('id');
	
        protected $fillable = array('factura_id', 'producto_id', 'cantidad', 'importe', 'alicuota_id', 'importe_iva', 'total', 'detalle_array');
	
	public $timestamps = false;
        
     
        public function factura()
        {
            return $this->belongsTo('Factura');
        }
}
