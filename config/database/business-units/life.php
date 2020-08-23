<?php

return [
            'LIFE' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_LIFE', '127.0.0.1'),
                'port'           => env('DB_PORT_LIFE', '5432'),
                'database'       => env('DB_DATABASE_LIFE', 'forge'),
                'username'       => env('DB_USERNAME_LIFE', 'forge'),
                'password'       => env('DB_PASSWORD_LIFE', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_life',
                'sslmode'        => 'prefer',
            ],
        ];