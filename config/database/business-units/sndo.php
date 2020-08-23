<?php

return [
            'SNDO' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_SNDO', '127.0.0.1'),
                'port'           => env('DB_PORT_SNDO', '5432'),
                'database'       => env('DB_DATABASE_SNDO', 'forge'),
                'username'       => env('DB_USERNAME_SNDO', 'forge'),
                'password'       => env('DB_PASSWORD_SNDO', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_sindo_dev',
                'sslmode'        => 'prefer',
            ],
        ];