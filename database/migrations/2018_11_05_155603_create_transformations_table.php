<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transformations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description',600);
            $table->integer('prev_transformation_id')->unsigned()->nullable();
            $table->enum('type',['INITIAL','INTERMEDIATE','FINAL']);
            $table->string('image');
            $table->integer('model_id')->unsigned();
            $table->integer('productor_id')->unsigned();
            $table->string('unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transformations');
    }
}
