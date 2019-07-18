<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrayInTrayOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('trayin_trayouts', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('trayin_id')->unsigned()->nullable();
            $table->foreign('trayin_id')->references('id')->on('tray_ins')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->Integer('trayout_id')->unsigned()->nullable();
            $table->foreign('trayout_id')->references('id')->on('tray_outs')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();
            $table->integer('stock')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tray_in__tray_outs');
    }
}
