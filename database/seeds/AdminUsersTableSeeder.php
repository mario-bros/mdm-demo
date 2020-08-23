<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::connection('mysql')->table('admin_users')->delete();
        
        \DB::connection('mysql')->table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 22,
                'username' => 'mario.fredrick',
                'password' => bcrypt('password'),
                'name' => 'Mario Fredrick',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2020-05-29 15:48:18',
                'updated_at' => '2020-07-27 14:19:02',
                'unit_id' => 'TEST',
                'email' => 'mario.fredrick@mncgroup.com',
            ),
            1 => 
            array (
                'id' => 25,
                'username' => 'winda.romadhon',
                'password' => bcrypt('password'),
                'name' => 'Winda Romadhon',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2020-07-13 08:32:52',
                'updated_at' => '2020-07-27 14:19:03',
                'unit_id' => 'INSU',
                'email' => 'winda.romadhon@mncgroup.com',
            ),
        ));
        
        
    }
}