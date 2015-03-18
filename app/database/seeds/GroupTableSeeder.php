<?php

class GroupTableSeeder extends Seeder {

    public function run()
    {
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::createGroup(array(
            'name'        => 'admin',
            'zhname'      => '物资平台管理员',
            'permissions'  => array(
                'admin'   => 1,
                'user'    => 1,
            ),
        ));

        Sentry::createGroup(array(
            'name'        => 'user',
            'zhname'      => '物资平台用户',
            'permissions' => array(
                'admin'   => 0,
                'user'    => 1,
            ),
        ));
    }
}
