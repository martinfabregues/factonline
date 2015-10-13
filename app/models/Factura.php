<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Factura extends Eloquent {

	protected $table = 'facturas';

	protected $guarded = array('id');	
	
        protected $dates = ['cae_vencimiento', 'fecha'];
        
        protected $fillable = array('fecha', 'numerofactura', 'puntaventa_id', 'tipocomprobante_id', 'concepto_id', 'formapago_id', 
            'cliente_id', 'subtotal', 'iva', 'tributos', 'total', 'cae', 'cae_vencimiento', 'estado', 'observaciones');
        
	public $timestamps = false;
        
        public function TipoComprobante()
        {
            return $this->belongsTo('TipoComprobante', 'tipocomprobante_id', 'id');
        }
        
        public function Cliente()
        {
            return $this->belongsTo('Cliente', 'cliente_id', 'id');
        }
        
        public function PuntoVenta()
        {
            return $this->belongsTo('PuntoVenta', 'puntoventa_id', 'id');
        }
        
        public function detalle()
        {
            return $this->hasMany('FacturaDetalle');
        }
}
