<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ApplicationMaterialTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $aid = \Application::lists('id');
        $mid = \Material::lists('id');

        foreach(range(1, 100) as $index)
        {
            ApplicationMaterial::create([
                'application_id'    => $faker->randomElement($aid),
                'material_id'       => $faker->randomElement($mid),
                'number'            => $faker->randomDigitNotNull,
                'comment'           => $faker->sentence($nbWords = 10),
            ]);
        }
    }

}
