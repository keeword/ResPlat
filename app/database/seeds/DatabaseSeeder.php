<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('GroupTableSeeder');
        $this->call('UserTableSeeder');
        // $this->call('CategoryTableSeeder');
        // $this->call('MaterialTableSeeder');
        // $this->call('ApplicationTableSeeder');
        // $this->call('ApplicationMaterialTableSeeder');

    }

}
