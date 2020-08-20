<?php

namespace App\Model\BusinessUnits\SPIN;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct() 
    {
        $currentDBConfigs = $this->setDBConnectionConfig('SPIN');
        \Config::set('database.connections.SPIN', $currentDBConfigs);
        $this->connection = 'SPIN';

        $this->keyType = 'string';

        parent::__construct();
    }

}
