<?php

return [
            'MSSO' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_MSSO', '127.0.0.1'),
                'port'           => env('DB_PORT_MSSO', '5432'),
                'database'       => env('DB_DATABASE_MSSO', 'forge'),
                'username'       => env('DB_USERNAME_MSSO', 'forge'),
                'password'       => env('DB_PASSWORD_MSSO', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_sso',
                'sslmode'        => 'prefer',
            ],
        ];