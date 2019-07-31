<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('processes', function (Blueprint $table) {
            $table->increments('id');

            $table->String('tarja_proceso');
            
            $table->Integer('quality_id')->unsigned();
            $table->foreign('quality_id')->references('id')->on('qualities')->onDelete('cascade');

            $table->Integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');

            $table->Boolean('available')->default('1');
            $table->Boolean('rejected')->default('0');
            
            $table->Boolean('wash')->default('1');

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
        Schema::dropIfExists('processes');
    }
}
