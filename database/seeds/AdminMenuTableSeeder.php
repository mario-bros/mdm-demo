<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::connection('mysql')->table('admin_menu')->delete();
        
        \DB::connection('mysql')->table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Admin',
                'icon' => 'fa-tasks',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-09-06 14:27:36',
            ),
            1 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 4,
                'title' => 'Roles',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-09-06 14:28:44',
            ),
            2 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 7,
                'title' => 'Operation log',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-09-06 14:29:33',
            ),
            3 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 6,
                'title' => 'Menu',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-09-06 14:34:35',
            ),
            4 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 3,
                'title' => 'Users',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-09-06 14:37:32',
            ),
            5 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 5,
                'title' => 'Permission',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-09-06 14:39:09',
            ),
            6 => 
            array (
                'id' => 16,
                'parent_id' => 0,
                'order' => 23,
                'title' => 'Scheduling',
                'icon' => 'fa-clock-o',
                'uri' => 'scheduling',
                'permission' => NULL,
                'created_at' => '2019-08-02 17:52:10',
                'updated_at' => '2019-10-02 11:05:24',
            ),
            7 => 
            array (
                'id' => 22,
                'parent_id' => 0,
                'order' => 24,
                'title' => 'Settings & Configs',
                'icon' => 'fa-gears',
                'uri' => NULL,
                'permission' => 'email.setting',
                'created_at' => '2019-08-15 09:44:40',
                'updated_at' => '2019-10-02 11:05:24',
            ),
            8 => 
            array (
                'id' => 23,
                'parent_id' => 22,
                'order' => 25,
                'title' => 'Email Setting',
                'icon' => 'fa-envelope',
                'uri' => NULL,
                'permission' => 'email.setting',
                'created_at' => '2019-08-15 09:46:29',
                'updated_at' => '2019-10-02 11:05:24',
            ),
            9 => 
            array (
                'id' => 24,
                'parent_id' => 23,
                'order' => 26,
                'title' => 'Config',
                'icon' => 'fa-gear',
                'uri' => '/email/config',
                'permission' => 'email.setting',
                'created_at' => '2019-08-15 09:48:41',
                'updated_at' => '2019-10-02 11:05:24',
            ),
            10 => 
            array (
                'id' => 25,
                'parent_id' => 23,
                'order' => 27,
                'title' => 'Template',
                'icon' => 'fa-bars',
                'uri' => '/email/template',
                'permission' => 'email.setting',
                'created_at' => '2019-08-15 09:49:23',
                'updated_at' => '2019-10-02 11:05:24',
            ),
            11 => 
            array (
                'id' => 14,
                'parent_id' => 0,
                'order' => 16,
                'title' => 'New Request',
                'icon' => 'fa-shopping-basket',
                'uri' => NULL,
                'permission' => 'new.customer',
                'created_at' => '2019-08-01 11:15:23',
                'updated_at' => '2019-10-02 11:08:12',
            ),
            12 => 
            array (
                'id' => 15,
                'parent_id' => 14,
                'order' => 17,
                'title' => 'Customer',
                'icon' => 'fa-users',
                'uri' => '/new_request/customer',
                'permission' => 'new.customer',
                'created_at' => '2019-08-01 11:18:33',
                'updated_at' => '2019-10-02 11:08:12',
            ),
            13 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Dashboard',
                'icon' => 'fa-bar-chart',
                'uri' => NULL,
                'permission' => 'dashboard',
                'created_at' => NULL,
                'updated_at' => '2019-09-06 14:15:32',
            ),
            14 => 
            array (
                'id' => 31,
                'parent_id' => 2,
                'order' => 9,
                'title' => 'Lookup List',
                'icon' => 'fa-group',
                'uri' => '/lookup/references',
                'permission' => NULL,
                'created_at' => '2020-05-13 09:48:20',
                'updated_at' => '2020-05-13 09:48:20',
            ),
        ));
        
        
    }
}