<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_processes', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('process_id')->unsigned();
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('cascade');

            $table->Integer('format_id')->unsigned();
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');

            $table->Integer('quantity');
            
            $table->Integer('weight');


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
        Schema::dropIfExists('sub_processes');
    }
}
