@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <table class="table table-stripped">
             <thead>

                     <td>Nodo</td>
                     <td>Descripción</td>
                     <td>Último Mensaje</td>
                     <td>Tags</td>
                     <td></td>
             </thead>
             <tbody id="tbody">
             @foreach ($nodos as $nodo)
                    <tr >
                        <td>{{$nodo->codigo}}</td>
                        <td>{{$nodo->descripcion}}</td>
                            <td>
                            <div class="node-listener" data-nodo="{{$nodo->id}}">
                                {{$nodo->ultimoPaquete()->created_at}}
                            </div>
                            </td>
                        <td>{{$nodo->tags}}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-success  btn-sm" type="button">
                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
            @endforeach
            </tbody>
                    </table>
                    </div>
                </div>
</div>
<script>

$(document).ready(function(){



setInterval(function(){

   update();
},1000)

update();
})

function update(){
        var data = null;

        $.get('/api/lastMessages/',function(data){

            $('.node-listener').each(function(){
                nodo = $(this)
                last = $(this).html();
                nuevo = data[nodo.data('nodo')]['created_at'];
                if(last !== nuevo)
                {
                    nodo.hide();
                    nodo.fadeIn()
                    nodo.html(nuevo);
                }

            })
        })

}
</script>
@endsection

