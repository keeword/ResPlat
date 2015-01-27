<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('checker_id')->unsigned();
            $table->text('reason');
            $table->text('response')->nullable();
            $table->string('status')->default('wating');
            $table->string('person');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('borrow_time');
            $table->timestamp('return_time');
            $table->timestamps();

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
        Schema::drop('application');
    }

}
