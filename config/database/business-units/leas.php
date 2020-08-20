<?php

return [
            'LEAS' => [
                'driver'         => 'pgsql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_LEASING', '127.0.0.1'),
                'port'           => env('DB_PORT_LEASING', '5432'),
                'database'       => env('DB_DATABASE_LEASING', 'forge'),
                'username'       => env('DB_USERNAME_LEASING', 'forge'),
                'password'       => env('DB_PASSWORD_LEASING', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_leasing',
                'sslmode'        => 'prefer',
            ],
        ];