<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Concepto extends Eloquent {

	protected $table = 'conceptos';

	protected $guarded = array('id');
	
	
	public $timestamps = false;
}
