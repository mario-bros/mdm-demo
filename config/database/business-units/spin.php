<?php

return [
            'SPIN' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_SPIN', '127.0.0.1'),
                'port'           => env('DB_PORT_SPIN', '5432'),
                'database'       => env('DB_DATABASE_SPIN', 'forge'),
                'username'       => env('DB_USERNAME_SPIN', 'forge'),
                'password'       => env('DB_PASSWORD_SPIN', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_spin',
                'sslmode'        => 'prefer',
            ],
        ];