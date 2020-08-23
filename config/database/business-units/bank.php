<?php

return [
            'BANK' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_BANK', '127.0.0.1'),
                'port'           => env('DB_PORT_BANK', '5432'),
                'database'       => env('DB_DATABASE_BANK', 'forge'),
                'username'       => env('DB_USERNAME_BANK', 'forge'),
                'password'       => env('DB_PASSWORD_BANK', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_bank_dev',
                'sslmode'        => 'prefer',
            ],
        ];