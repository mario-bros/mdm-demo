<?php

return [
            'STAR' => [
                'driver'         => 'pgsql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_STAR', '127.0.0.1'),
                'port'           => env('DB_PORT_STAR', '5432'),
                'database'       => env('DB_DATABASE_STAR', 'forge'),
                'username'       => env('DB_USERNAME_STAR', 'forge'),
                'password'       => env('DB_PASSWORD_STAR', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_smn_dev',
                'sslmode'        => 'prefer',
            ],
        ];