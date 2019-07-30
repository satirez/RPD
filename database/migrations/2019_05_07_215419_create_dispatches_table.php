<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('exporter_id')->unsigned();
            
            $table->foreign('exporter_id')->references('id')->on('exporters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

             $table->Integer('subprocess_id')->unsigned();
            $table->foreign('subprocess_id')->references('id')->on('sub_processes')->onDelete('cascade');


            $table->Integer('tipodispatch_id')->unsigned();
            $table->foreign('tipodispatch_id')->references('id')->on('tipo_dispatches')->onDelete('cascade');

            $table->String('Destino');
            

            //se debe hacer
            $table->integer('tipo_despacho');


            $table->String('patentNo');
            $table->boolean('rejected');

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
        Schema::dropIfExists('dispatches');
    }
}
