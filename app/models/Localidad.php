<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Localidad extends Eloquent {

	protected $table = 'localidades';

	protected $guarded = array('id');
	
	protected $fillable = array('ciudad_id', 'localidad', 'activo');
	
	public $timestamps = false;
}
