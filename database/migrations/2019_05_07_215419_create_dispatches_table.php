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



            $table->Integer('tipodispatch_id')->unsigned();
            $table->foreign('tipodispatch_id')->references('id')->on('tipo_dispatches')->onDelete('cascade');

            $table->String('destino');
            

            $table->String('patentNo');
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
