<?php

return [
            'VISI' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_VISION', '127.0.0.1'),
                'port'           => env('DB_PORT_VISION', '5432'),
                'database'       => env('DB_DATABASE_VISION', 'forge'),
                'username'       => env('DB_USERNAME_VISION', 'forge'),
                'password'       => env('DB_PASSWORD_VISION', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_vision',
                'sslmode'        => 'prefer',
            ],
        ];