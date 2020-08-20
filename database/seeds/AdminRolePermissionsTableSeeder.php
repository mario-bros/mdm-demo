<?php

use Illuminate\Database\Seeder;

class AdminRolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_permissions')->delete();
        
        \DB::table('admin_role_permissions')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 1,
                'permission_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'role_id' => 1,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'role_id' => 6,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'role_id' => 6,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'role_id' => 6,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'role_id' => 2,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'role_id' => 2,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'role_id' => 2,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'role_id' => 2,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'role_id' => 2,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'role_id' => 3,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'role_id' => 3,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'role_id' => 3,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'role_id' => 3,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'role_id' => 3,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'role_id' => 4,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'role_id' => 4,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'role_id' => 4,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'role_id' => 4,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'role_id' => 4,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'role_id' => 5,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'role_id' => 5,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'role_id' => 5,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'role_id' => 5,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'role_id' => 5,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'role_id' => 6,
                'permission_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'role_id' => 6,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'role_id' => 6,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'role_id' => 6,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'role_id' => 6,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'role_id' => 6,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'role_id' => 6,
                'permission_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'role_id' => 2,
                'permission_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'role_id' => 2,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'role_id' => 3,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'role_id' => 4,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'role_id' => 5,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'role_id' => 1,
                'permission_id' => 18,
                'created_at' => '2020-05-13 09:48:20',
                'updated_at' => '2020-05-13 09:48:20',
            ),
            42 => 
            array (
                'role_id' => 1,
                'permission_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'role_id' => 1,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}