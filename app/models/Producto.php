<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Producto extends Eloquent {

	protected $table = 'productos';

	protected $guarded = array('id');
	
	protected $fillable = array('codigo', 'categoria_id', 'nombre', 'importe', 'alicuota_id', 'activo');
        
	public $timestamps = false;
        
        public function Categoria()
        {
            return $this->belongsTo('Categoria', 'categoria_id', 'id');
        }
        
        public function Alicuota()
        {
            return $this->belongsTo('AlicuotaIva', 'alicuota_id', 'id');
        }
}
