<?php

namespace App\Model\BusinessUnits\MSSO;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;


class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;
	
    public function __construct()
    {
        $currentDBConfigs = $this->setDBConnectionConfig('MSSO');
        \Config::set('database.connections.MSSO', $currentDBConfigs);
        $this->connection = 'MSSO';

        $this->keyType = 'string';

        parent::__construct();
    }
}
