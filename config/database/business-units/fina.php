<?php

return [
            'FINA' => [
                /*'driver'         => 'pgsql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_FINANCE', '127.0.0.1'),
                'port'           => env('DB_PORT_FINANCE', '5432'),
                'database'       => env('DB_DATABASE_FINANCE', 'forge'),
                'username'       => env('DB_USERNAME_FINANCE', 'forge'),
                'password'       => env('DB_PASSWORD_FINANCE', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_finance',
                'sslmode'        => 'prefer',*/

                'driver'         => 'pgsql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST', '127.0.0.1'),
                'port'           => env('DB_PORT', '5432'),
                'database'       => env('DB_DATABASE', 'forge'),
                'username'       => env('DB_USERNAME', 'forge'),
                'password'       => env('DB_PASSWORD', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_finance',
                'sslmode'        => 'prefer',
            ],
        ];