<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchLoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch__lote', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lote_id')->unsigned();
            $table->integer('dispatch_id')->unsigned();
            
            $table->timestamps();
    
            //relation
            $table->foreign('lote_id')->references('id')->on('lotes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
    
            $table->foreign('dispatch_id')->references('id')->on('dispatches')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->integer('fruit_id')->unsigned();
                $table->integer('variety_id')->unsigned();
                $table->integer('quality_id')->unsigned();
    
                $table->foreign('fruit_id')->references('id')->on('fruits');
                $table->foreign('variety_id')->references('id')->on('varieties');
                $table->foreign('quality_id')->references('id')->on('qualities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch__lote');
    }
}
