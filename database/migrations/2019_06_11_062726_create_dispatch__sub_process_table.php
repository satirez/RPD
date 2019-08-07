<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchSubProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_sub_process', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sub_process_id')->unsigned();
            $table->integer('dispatch_id')->unsigned();
            
            $table->timestamps();
    
            //relation
            $table->foreign('sub_process_id')->references('id')->on('sub_processes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
    
            $table->foreign('dispatch_id')->references('id')->on('dispatches')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch__sub_process');
    }
}
