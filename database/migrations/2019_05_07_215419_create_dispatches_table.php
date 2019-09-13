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

            $table->String('planilla_dispatch');
            $table->String('numero_guia');
            $table->String('numero_despacho');
            
            $table->Integer('season_id')->unsigned();
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');



            $table->Integer('tipodispatch_id')->unsigned();
            $table->foreign('tipodispatch_id')->references('id')->on('tipo_dispatches')->onDelete('cascade');

            $table->Integer('tipotransporte_id')->unsigned();
            $table->foreign('tipotransporte_id')->references('id')->on('tipo_transportes')->onDelete('cascade');

           

            $table->String('puerto_salida');
            $table->String('puerto_destino');
            $table->String('consignatario');
            $table->String('numero_contenedor');

        
            
            $table->String('nombre_chofer');
            $table->String('patente_vehiculo');
            $table->String('patente_rampla');
            $table->Boolean('rejected')->default('0');

            $table->integer('reason')->unsigned()->nullable();
            $table->foreign('reason')->references('id')->on('motivorejecteds');
            $table->String('comment')->nullable();

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
