<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationMaterialTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_material', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('application_id');
            $table->integer('material_id');
            $table->integer('number');
            $table->string('comment');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('application_material');
    }

}
