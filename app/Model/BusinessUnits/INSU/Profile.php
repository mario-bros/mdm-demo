<?php

namespace App\Model\BusinessUnits\INSU;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct() 
    {
        $currentDBConfigs = $this->setDBConnectionConfig('INSU');
        \Config::set('database.connections.INSU', $currentDBConfigs);
        $this->connection = 'INSU';

        $this->keyType = 'string';

        parent::__construct();
    }
}
