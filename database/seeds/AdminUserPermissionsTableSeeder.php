<?php

use Illuminate\Database\Seeder;

class AdminUserPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::connection('mysql')->table('admin_user_permissions')->delete();
        
        \DB::connection('mysql')->table('admin_user_permissions')->insert(array (
            0 => 
            array (
                'user_id' => 1,
                'permission_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'user_id' => 22,
                'permission_id' => 17,
                'created_at' => '2020-06-01 05:49:04',
                'updated_at' => '2020-06-01 05:49:04',
            ),
            2 => 
            array (
                'user_id' => 6,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'user_id' => 6,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'user_id' => 6,
                'permission_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'user_id' => 6,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'user_id' => 6,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'user_id' => 6,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'user_id' => 6,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'user_id' => 6,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'user_id' => 6,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'user_id' => 6,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'user_id' => 6,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'user_id' => 6,
                'permission_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'user_id' => 9,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'user_id' => 9,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'user_id' => 9,
                'permission_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'user_id' => 9,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'user_id' => 9,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'user_id' => 9,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'user_id' => 9,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'user_id' => 9,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'user_id' => 9,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'user_id' => 9,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'user_id' => 9,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'user_id' => 9,
                'permission_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'user_id' => 10,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'user_id' => 10,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'user_id' => 10,
                'permission_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'user_id' => 10,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'user_id' => 10,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'user_id' => 10,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'user_id' => 10,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'user_id' => 10,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'user_id' => 10,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'user_id' => 10,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'user_id' => 10,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'user_id' => 10,
                'permission_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'user_id' => 11,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'user_id' => 11,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'user_id' => 11,
                'permission_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'user_id' => 11,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'user_id' => 11,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'user_id' => 11,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'user_id' => 11,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'user_id' => 11,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'user_id' => 11,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'user_id' => 11,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'user_id' => 11,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'user_id' => 11,
                'permission_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'user_id' => 13,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'user_id' => 13,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'user_id' => 13,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'user_id' => 13,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'user_id' => 13,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'user_id' => 13,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'user_id' => 14,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'user_id' => 14,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'user_id' => 14,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'user_id' => 14,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'user_id' => 14,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'user_id' => 14,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'user_id' => 15,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'user_id' => 15,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'user_id' => 15,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'user_id' => 15,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'user_id' => 15,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'user_id' => 15,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'user_id' => 16,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'user_id' => 16,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'user_id' => 16,
                'permission_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'user_id' => 16,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'user_id' => 16,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'user_id' => 16,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'user_id' => 16,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'user_id' => 16,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'user_id' => 16,
                'permission_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'user_id' => 16,
                'permission_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'user_id' => 16,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'user_id' => 16,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'user_id' => 16,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'user_id' => 16,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'user_id' => 17,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'user_id' => 17,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'user_id' => 17,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'user_id' => 17,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'user_id' => 17,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'user_id' => 17,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'user_id' => 17,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'user_id' => 17,
                'permission_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'user_id' => 17,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'user_id' => 17,
                'permission_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'user_id' => 17,
                'permission_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'user_id' => 17,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'user_id' => 17,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'user_id' => 1,
                'permission_id' => 17,
                'created_at' => '2020-03-26 12:07:07',
                'updated_at' => '2020-03-26 12:07:07',
            ),
            96 => 
            array (
                'user_id' => 21,
                'permission_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}