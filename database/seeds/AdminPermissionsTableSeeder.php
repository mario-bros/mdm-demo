<?php

use Illuminate\Database\Seeder;

class AdminPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::connection('mysql')->table('admin_permissions')->delete();
        
        \DB::connection('mysql')->table('admin_permissions')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'http_method' => 'GET',
                'http_path' => '/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Login',
                'slug' => 'auth.login',
                'http_method' => '',
                'http_path' => '/auth/login
/auth/logout',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'User setting',
                'slug' => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path' => '/auth/setting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'Admin helpers',
                'slug' => 'ext.helpers',
                'http_method' => NULL,
                'http_path' => '/helpers/*',
                'created_at' => '2019-08-01 11:07:20',
                'updated_at' => '2019-08-01 11:07:20',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'Logs',
                'slug' => 'ext.log-viewer',
                'http_method' => NULL,
                'http_path' => '/logs*',
                'created_at' => '2019-08-01 11:08:26',
                'updated_at' => '2019-08-01 11:08:26',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'Scheduling',
                'slug' => 'ext.scheduling',
                'http_method' => NULL,
                'http_path' => '/scheduling*',
                'created_at' => '2019-08-02 17:52:11',
                'updated_at' => '2019-08-02 17:52:11',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'Admin Config',
                'slug' => 'ext.config',
                'http_method' => NULL,
                'http_path' => '/config*',
                'created_at' => '2019-08-02 17:56:56',
                'updated_at' => '2019-08-02 17:56:56',
            ),
            7 => 
            array (
                'id' => 5,
                'name' => 'Auth management',
                'slug' => 'auth.management',
                'http_method' => '',
                'http_path' => '/auth/roles
/auth/permissions
/auth/menu
/auth/logs
/auth/users',
                'created_at' => NULL,
                'updated_at' => '2019-09-06 14:22:59',
            ),
            8 => 
            array (
                'id' => 14,
                'name' => 'Email Setting',
                'slug' => 'email.setting',
                'http_method' => '',
                'http_path' => '/email/*',
                'created_at' => '2019-09-06 14:45:32',
                'updated_at' => '2019-09-06 14:45:32',
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'Reports',
                'slug' => 'reports',
                'http_method' => '',
                'http_path' => '/reports/*
/_handle_action_
/_handle_form_',
                'created_at' => '2019-09-06 13:59:31',
                'updated_at' => '2019-09-09 06:50:18',
            ),
            10 => 
            array (
                'id' => 1,
                'name' => 'All permission',
                'slug' => 'all.permission',
                'http_method' => '',
                'http_path' => '/auth/roles/*
/auth/permissions/*
/auth/menu/*
/auth/logs/*
/auth/users/*
/auth/setting/*
/auth/login
/auth/logout
/helpers/*
/logs*
/scheduling*
/config*
/email/*
/compare/*
/_handle_action_  
/_handle_form_
/detail*',
                'created_at' => NULL,
                'updated_at' => '2019-09-22 05:23:16',
            ),
            11 => 
            array (
                'id' => 16,
                'name' => 'MDO Setting',
                'slug' => 'mdo.setting',
                'http_method' => '',
                'http_path' => '/auth/setting/*',
                'created_at' => '2019-09-30 11:09:34',
                'updated_at' => '2019-09-30 11:15:11',
            ),
            12 => 
            array (
                'id' => 12,
                'name' => 'Customer Request',
                'slug' => 'customer.request',
                'http_method' => '',
                'http_path' => '/customer_request/*
/compare*
/_handle_form_
/_handle_action_
/detail*
/certified*
/edited_staging*',
                'created_at' => '2019-09-06 13:15:13',
                'updated_at' => '2019-10-01 07:10:01',
            ),
            13 => 
            array (
                'id' => 11,
                'name' => 'New Customer',
                'slug' => 'new.customer',
                'http_method' => '',
                'http_path' => '/new_request/*
/_handle_form_
/_handle_action_
/detail*
/edited_certified*',
                'created_at' => '2019-09-06 13:09:25',
                'updated_at' => '2019-10-01 07:10:25',
            ),
            14 => 
            array (
                'id' => 17,
                'name' => 'Api Access',
                'slug' => 'api.access',
                'http_method' => 'GET,PUT,POST',
                'http_path' => '/api/acces_config*',
                'created_at' => '2020-03-26 12:07:07',
                'updated_at' => '2020-03-26 12:07:07',
            ),
            15 => 
            array (
                'id' => 18,
                'name' => 'Lookup Access',
                'slug' => 'lookups',
                'http_method' => 'GET,PUT,POST',
                'http_path' => '/lookup/references*',
                'created_at' => '2020-05-13 09:48:20',
                'updated_at' => '2020-05-13 09:48:20',
            ),
        ));
        
        
    }
}