<?php

namespace App\Model\BusinessUnits\LIFE;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct() 
    {
        $currentDBConfigs = $this->setDBConnectionConfig('LIFE');
        \Config::set('database.connections.LIFE', $currentDBConfigs);
        $this->connection = 'LIFE';

        $this->keyType = 'string';

        parent::__construct();
    }
}
