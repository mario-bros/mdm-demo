<?php

namespace App\Model\BusinessUnits\VISI;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;


    public function __construct()
    {
        $currentDBConfigs = $this->setDBConnectionConfig('VISI');
        \Config::set('database.connections.VISI', $currentDBConfigs);
        $this->connection = 'VISI';

        $this->keyType = 'string';

        parent::__construct();
    }
}
