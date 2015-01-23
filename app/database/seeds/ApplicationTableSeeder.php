<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ApplicationTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $id = \User::lists('id');

		foreach(range(1, 30) as $index)
		{
			Application::create([
                'user_id'       => $faker->randomElement($array = $id),
                'checker_id'    => $faker->randomElement($array = $id),
                'reason'        => $faker->sentence($nbWords = 10),
                'response'      => $faker->sentence($nbWords = 10),
                'status'        => $faker->randomElement($array = array('waiting', 'pass', 'refuse')),
                'borrow_time'   => $faker->dateTimeThisMonth($max = 'now'),
                'return_time'   => $faker->dateTimeThisMonth($max = 'now'),
			]);
		}
	}

}
