<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CondicionIva extends Eloquent {

	protected $table = 'condicionesiva';

	protected $guarded = array('id');	
	
	public $timestamps = false;
}
