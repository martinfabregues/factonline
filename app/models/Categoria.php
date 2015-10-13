<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Categoria extends Eloquent {

	protected $table = 'categorias';

	protected $guarded = array('id');
	
	protected $fillable = array('categoria', 'activo');
	
	public $timestamps = false;
}

