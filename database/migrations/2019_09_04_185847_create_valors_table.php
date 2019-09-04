<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paquete_id');
            $table->foreign('paquete_id')->references('id')->on("paquetes");
            //
            $table->string('nombre');
            $table->float('valor',20,5);
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valors');
    }
}
