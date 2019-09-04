<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nodo;
class NodoController extends Controller
{
    //

    public function home($id = 1)
    {
        $nodo = nodo::find(1);

        return view("home")->with('nodo',$nodo);
    }
}
