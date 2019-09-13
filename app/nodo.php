<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nodo extends Model
{
    //

    public function registros()
    {
        return $this->hasMany('App\registro','device_id','device_id');
    }


    public function paquetes()
    {
        return $this->hasMany('App\Paquete');
    }

    public function ultimoPaquete()
    {
        return $this->paquetes->last();
    }

}
