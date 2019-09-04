<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    //

    public function nodos(){
        return $this->hasMany('App\nodo');
    }
}
