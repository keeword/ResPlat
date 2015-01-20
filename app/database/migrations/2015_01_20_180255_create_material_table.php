<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->integer('total_number');
            $table->integer('lent_number');
            $table->timestamps();

			$table->engine = 'InnoDB';
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('material');
    }

}
