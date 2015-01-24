<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialCategoryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
/*            
        Schema::create('material_category', function(Blueprint $table)
        {
            $table->integer('material_id')->unsigned();
            $table->integer('category_id')->unsigned();

			$table->engine = 'InnoDB';
            $table->primary(array('material_id', 'category_id'));
        });
*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }

}
