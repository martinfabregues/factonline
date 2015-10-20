<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class TipoComprobante extends Eloquent {

	protected $table = 'tiposcomprobante';

	protected $guarded = array('id');
	
	
	
	public $timestamps = false;
        

}
