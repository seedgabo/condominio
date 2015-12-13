<?php


Event::listen('eliminarArchivo', function($path)
{
	if (File::exists($path))
   		return File::delete($path);
   	else 
   		return false;
});

Event::listen('auth.login', function($user) {
    $user->last_login = Carbon::now();
    $user->save();
});

Event::listen('register.image',function($path,$nombre,$album){
	Galeria::create(array('path' => $path,'nombre'=> $nombre,'album' => $album ,'persona_id' => Auth::id()));
});