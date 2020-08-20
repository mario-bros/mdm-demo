<?php

return [
            'ASET' => [
                'driver'         => 'pgsql',
                'url'            => env('DATABASE_URL'),
                'host'           => env('DB_HOST_ASET', '127.0.0.1'),
                'port'           => env('DB_PORT_ASET', '5432'),
                'database'       => env('DB_DATABASE_ASET', 'forge'),
                'username'       => env('DB_USERNAME_ASET', 'forge'),
                'password'       => env('DB_PASSWORD_ASET', ''),
                'charset'        => 'utf8',
                'prefix'         => '',
                'prefix_indexes' => true,
                'schema'         => 'mdm_staging_assetmgt_dev',
                'sslmode'        => 'prefer',
            ],
        ];