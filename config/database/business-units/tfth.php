<?php

return [
            'TFTH' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_TFTHING', '127.0.0.1'),
                'port'           => env('DB_PORT_TFTHING', '5432'),
                'database'       => env('DB_DATABASE_TFTHING', 'forge'),
                'username'       => env('DB_USERNAME_TFTHING', 'forge'),
                'password'       => env('DB_PASSWORD_TFTHING', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_tft',
                'sslmode'        => 'prefer',
            ],
        ];