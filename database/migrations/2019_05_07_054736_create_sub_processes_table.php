
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
            $table->engine = ('InnoDB');

            $table->increments('id');

            $table->Integer('process_id')->unsigned();
            $table->foreign('process_id')->references('id')->on('processes');

            $table->Integer('format_id')->unsigned();
            $table->foreign('format_id')->references('id')->on('formats');
            
            $table->Integer('quality_id')->unsigned();
            $table->foreign('quality_id')->references('id')->on('qualities');

            $table->Integer('fruit_id')->unsigned();
            $table->foreign('fruit_id')->references('id')->on('fruits');

            $table->Integer('variety_id')->unsigned();
            $table->foreign('variety_id')->references('id')->on('varieties');

            $table->Integer('quantity');
            
            $table->Integer('weight');
            $table->Boolean('available')->default('1');
    
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
        Schema::dropIfExists('sub_processes');
    }
}
