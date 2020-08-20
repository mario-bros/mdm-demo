<?php

namespace App\Model\BusinessUnits\KVIS;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;
	
    public function __construct() 
    {
        $currentDBConfigs = $this->setDBConnectionConfig('KVIS');
        \Config::set('database.connections.KVIS', $currentDBConfigs);
        $this->connection = 'KVIS';

        $this->keyType = 'string';

        parent::__construct();
    }

}
