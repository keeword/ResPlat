<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MaterialTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            Material::create([
                'name'         => $faker->name,
                'description'  => $faker->sentence($nbWrods = 10),
                'total_number' => $faker->randomDigitNotNull,
                'lent_number'  => $faker->randomDigitNotNull,
                'category_id'  => $faker->randomDigitNotNull,
            ]);
        }
    }

}
