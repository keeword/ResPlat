<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkroomTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workroom', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id');
            $table->integer('checker_id');
            $table->text('reason');
            $table->text('response')->nullable();
            $table->string('status')->default('wating');
            $table->string('person');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('borrow_time');
            $table->timestamp('return_time');
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
        Schema::drop('workroom');
    }

}
