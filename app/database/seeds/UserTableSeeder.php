<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        Sentry::createUser(array(
          'username'   => 'test',
          'nickname'   => '测试',
          'password'   => '123456789',
          'activated'  => true,
        ));
        $adminUser  = Sentry::getUserProvider()->findByLogin('test');
        $adminGroup = Sentry::getGroupProvider()->findByName('admin');
        $adminUser->addGroup($adminGroup);

        Sentry::createUser(array(
          'username'   => 'admin',
          'nickname'   => '管理员',
          'password'   => '123456789',
          'activated'  => true,
        ));
        $adminUser  = Sentry::getUserProvider()->findByLogin('admin');
        $adminGroup = Sentry::getGroupProvider()->findByName('admin');
        $adminUser->addGroup($adminGroup);

        Sentry::createUser(array(
          'username'   => 'user',
          'nickname'   => '用户',
          'password'   => '123456789',
          'activated'  => true,
        ));
        $User  = Sentry::getUserProvider()->findByLogin('user');
        $userGroup = Sentry::getGroupProvider()->findByName('user');
        $User->addGroup($userGroup);
    }

}
