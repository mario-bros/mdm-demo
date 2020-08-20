<?php

return [
            'PLAY' => [
                'driver'         => 'pgsql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_PLAY', '127.0.0.1'),
                'port'           => env('DB_PORT_PLAY', '5432'),
                'database'       => env('DB_DATABASE_PLAY', 'forge'),
                'username'       => env('DB_USERNAME_PLAY', 'forge'),
                'password'       => env('DB_PASSWORD_PLAY', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_play',
                'sslmode'        => 'prefer',
            ],
        ];