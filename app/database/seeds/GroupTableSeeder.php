<?php

class GroupTableSeeder extends Seeder {

    public function run()
    {
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::createGroup(array(
            'name'        => 'admin',
            'permissions'  => array(
                'admin'   => 1,
                'checker' => 1,
                'user'    => 1,
            ),
        ));

        Sentry::createGroup(array(
            'name'        => 'checker',
            'permissions' => array(
                'admin'   => 0,
                'checker' => 0,
                'user'    => 0,
            ),
        ));

        Sentry::createGroup(array(
            'name'        => 'user',
            'permissions' => array(
                'admin'   => 0,
                'checker' => 0,
                'user'    => 0,
            ),
        ));
    }
}
