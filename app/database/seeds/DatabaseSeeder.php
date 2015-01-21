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
        $this->call('CategoryTableSeeder');
        $this->call('MaterialTableSeeder');


        // 将用户加入用户组
        $adminUser  = Sentry::getUserProvider()->findByLogin('test');
        $adminGroup = Sentry::getGroupProvider()->findByName('admin');
        $adminUser->addGroup($adminGroup);
    }

}
