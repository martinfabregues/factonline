<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class FormaPago extends Eloquent {

	protected $table = 'formaspago';

	protected $guarded = array('id');
	
	
	public $timestamps = false;
}
