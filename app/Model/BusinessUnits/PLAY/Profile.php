<?php

namespace App\Model\BusinessUnits\PLAY;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;
	
    public function __construct() 
    {
        $currentDBConfigs = $this->setDBConnectionConfig('PLAY');
        \Config::set('database.connections.PLAY', $currentDBConfigs);
        $this->connection = 'PLAY';

        $this->keyType = 'string';

        parent::__construct();
    }
}
