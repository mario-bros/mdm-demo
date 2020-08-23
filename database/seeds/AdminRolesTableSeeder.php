<?php

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::connection('mysql')->table('admin_roles')->delete();
        
        \DB::connection('mysql')->table('admin_roles')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'MDO Checker',
                'slug' => 'checker',
                'created_at' => '2019-08-14 07:25:24',
                'updated_at' => '2019-08-14 07:25:24',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'MDO Approval',
                'slug' => 'approval',
                'created_at' => '2019-08-14 07:25:40',
                'updated_at' => '2019-08-14 07:25:40',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'MDO Certify',
                'slug' => 'certify',
                'created_at' => '2019-08-14 07:26:00',
                'updated_at' => '2019-08-14 07:26:00',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'MDO Holding',
                'slug' => 'holding',
                'created_at' => '2019-08-14 07:26:21',
                'updated_at' => '2019-08-14 07:26:21',
            ),
            4 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'created_at' => '2019-08-01 11:01:59',
                'updated_at' => '2019-08-01 11:01:59',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Moderator',
                'slug' => 'moderator',
                'created_at' => '2019-09-06 14:07:25',
                'updated_at' => '2019-09-06 14:07:25',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Golden Record Checker',
                'slug' => 'golden-record-checker',
                'created_at' => '2020-03-26 12:05:32',
                'updated_at' => '2020-03-26 12:05:32',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Golden Record Approval',
                'slug' => 'golden-record-approval',
                'created_at' => '2020-03-26 12:05:32',
                'updated_at' => '2020-03-26 12:05:32',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Golden Record Certifier',
                'slug' => 'golden-record-certifier',
                'created_at' => '2020-03-26 12:05:32',
                'updated_at' => '2020-03-26 12:05:32',
            ),
        ));
        
        
    }
}