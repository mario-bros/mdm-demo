<?php

return [
            'SEKU' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_SEKURITAS', '127.0.0.1'),
                'port'           => env('DB_PORT_SEKURITAS', '5432'),
                'database'       => env('DB_DATABASE_SEKURITAS', 'forge'),
                'username'       => env('DB_USERNAME_SEKURITAS', 'forge'),
                'password'       => env('DB_PASSWORD_SEKURITAS', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_sekuritas',
                'sslmode'        => 'prefer',
            ],
        ];