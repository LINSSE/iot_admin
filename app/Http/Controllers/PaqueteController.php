<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nodo;
use App\paquete;
use App\valor;
use stdClass;

class PaqueteController extends Controller
{
    //

    public function guardar(request $request)
    {
        $json = json_decode($request->getContent());

        try {
            if (isset($json->nodo))
            {

                ///Si el nodo no existe lo creo
                $nodo = nodo::where('codigo',$json->nodo)->first();
                if(!$nodo)
                {
                    $nodo = new nodo();
                    $nodo->codigo  = $json->nodo;
                    $nodo->save();
                }
            // $nodo
            $paquete = new paquete();
            $paquete->nodo_id = $nodo->id;
            $paquete->save();
            $c = 0;
            foreach ($json as $key => $value)
            {
               if($key !== 'nodo') //ignorar nodo
               {
                $val = new valor();
                $val->nombre = $key;
                $val->valor = $value;
                $val->paquete_id = $paquete->id;
                $val->save();
                $c++;
               }
            }

            $res = new stdClass();
            $res->error = 0;
            $res->nodo_id = $nodo->id;
            $res->paquete_id = $paquete->id;
            $res->valores_count = $c;



                return response()->json($res,200);

            } else {
                return response('ERROR: El mensaje debe contener el campo "nodo"',400);
            }
        } catch (\Throwable $th) {
            return response('Formato de Mensaje Incorrecto', 400);
        }


    }
}
