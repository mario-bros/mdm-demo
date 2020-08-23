<?php

return [
            'RPLS' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_RPLS', '127.0.0.1'),
                'port'           => env('DB_PORT_RPLS', '5432'),
                'database'       => env('DB_DATABASE_RPLS', 'forge'),
                'username'       => env('DB_USERNAME_RPLS', 'forge'),
                'password'       => env('DB_PASSWORD_RPLS', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_rplus',
                'sslmode'        => 'prefer',
            ]
        ];