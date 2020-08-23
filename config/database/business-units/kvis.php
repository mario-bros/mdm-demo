<?php

return [
            'KVIS' => [
                'driver'         => 'mysql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_KVISION', '127.0.0.1'),
                'port'           => env('DB_PORT_KVISION', '5432'),
                'database'       => env('DB_DATABASE_KVISION', 'forge'),
                'username'       => env('DB_USERNAME_KVISION', 'forge'),
                'password'       => env('DB_PASSWORD_KVISION', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_kvision',
                'sslmode'        => 'prefer',
            ],
        ];