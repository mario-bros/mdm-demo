<?php

namespace App\Model\BusinessUnits\TEST;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct()
    {
        $currentDBConfigs = $this->setDBConnectionConfig();
        \Config::set('database.connections.TEST', $currentDBConfigs);
        $this->connection = 'TEST';

        $this->keyType = 'string';

        parent::__construct();
    }
}
