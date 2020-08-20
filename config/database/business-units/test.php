<?php

return [
            'TEST' => [
                'driver'         => 'pgsql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_TEST', '127.0.0.1'),
                'port'           => env('DB_PORT_TEST', '5432'),
                'database'       => env('DB_DATABASE_TEST', 'forge'),
                'username'       => env('DB_USERNAME_TEST', 'forge'),
                'password'       => env('DB_PASSWORD_TEST', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_test_dev',
                'sslmode'        => 'prefer',
            ],
        ];