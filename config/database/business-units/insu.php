<?php

return [
            'INSU' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_INSURANCE', '127.0.0.1'),
                'port'           => env('DB_PORT_INSURANCE', '5432'),
                'database'       => env('DB_DATABASE_INSURANCE', 'forge'),
                'username'       => env('DB_USERNAME_INSURANCE', 'forge'),
                'password'       => env('DB_PASSWORD_INSURANCE', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_insurance',
                'sslmode'        => 'prefer',
            ],
        ];