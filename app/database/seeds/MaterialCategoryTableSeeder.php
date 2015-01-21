<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MaterialCategoryTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            MaterialCategory::create([
                'material_id' => $faker->numberBetween($min = 1, $max = 10),
                'category_id' => $faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }

}
