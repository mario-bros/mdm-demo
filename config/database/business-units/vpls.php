<?php

return [
            'VPLS' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_VPLUS', '127.0.0.1'),
                'port'           => env('DB_PORT_VPLUS', '5432'),
                'database'       => env('DB_DATABASE_VPLUS', 'forge'),
                'username'       => env('DB_USERNAME_VPLUS', 'forge'),
                'password'       => env('DB_PASSWORD_VPLUS', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_vplus',
                'sslmode'        => 'prefer',
            ],
        ];