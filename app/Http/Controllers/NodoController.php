<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nodo;
class NodoController extends Controller
{
    //
    public function home(){
        $nodos = nodo::all();

        return view("home",["nodos"=>$nodos]);
    }



    //API

    public function last($id)
    {
        return response()->json(nodo::find($id)->ultimoPaquete());
    }

    public function lastMessages(){

        $nodos = nodo::all();
        $last = [];
        foreach ($nodos as $nodo)
        {
            $last[$nodo->id] = $nodo->ultimoPaquete();
        }
        return response()->json($last);

    }
}
