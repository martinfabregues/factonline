<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AlicuotaIva extends Eloquent {

	protected $table = 'alicuotas';

	protected $guarded = array('id');		
	
	public $timestamps = false;
}

