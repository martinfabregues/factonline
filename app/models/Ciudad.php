<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Ciudad extends Eloquent {

	protected $table = 'ciudades';

	protected $guarded = array('id');
	
	protected $fillable = array('ciudad', 'activo');
	
	public $timestamps = false;
}
