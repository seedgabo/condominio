<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	protected $table = 'personas';

	protected $fillable =array('id','nombre','email','residencia_id','telefono','avatar','last_login','observaciones','admin', 'cedula');

	protected $hidden = array('password', 'remember_token');

	public function residencia()
	{
		return $this->hasOne('Residencias','id','residencia_id');
	}

	public function dispositivos()
    {
        return $this->hasMany('dispositivos','id','user_id');
    }

	public function notificaciones(){
		return $this->hasMany('notificacion');
	}

	


}
