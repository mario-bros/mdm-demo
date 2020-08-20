<?php

namespace App\Model\BusinessUnits\LEAS;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct() 
    {
        $currentDBConfigs = $this->setDBConnectionConfig('LEAS');
        \Config::set('database.connections.LEAS', $currentDBConfigs);
        $this->connection = 'LEAS';

        $this->keyType = 'string';

        parent::__construct();
    }
}
