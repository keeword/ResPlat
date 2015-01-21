<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        Sentry::createUser(array(
          'email'      => 'test@scut.edu',
          'username'   => 'test',
          'nickname'   => '测试',
          'password'   => "123456789",
          'activated'  => true,
        ));
    }

}
