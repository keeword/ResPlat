<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MaterialTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $id = \Category::lists('id');

        foreach(range(1, 30) as $index)
        {
            Material::create([
                'name'         => $faker->name,
                'description'  => $faker->sentence($nbWrods = 10),
                'category_id'  => $faker->randomElement($array = $id),
                'total_number' => $faker->randomDigitNotNull,
                'lent_number'  => $faker->randomDigitNotNull,
            ]);
        }
    }

}
