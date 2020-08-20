<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminPasswordUpdater extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersTable = config('admin.database.users_table');

        $updatePass = [
            'password' => bcrypt('123456789')
        ];

        DB::table( $usersTable )
            ->where('username', 'superadmin')
            ->update(
                $updatePass
            );
    }
}