<?php

namespace App\Model\BusinessUnits\VPLS;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;


    public function __construct()
    {
        $currentDBConfigs = $this->setDBConnectionConfig('VPLS');
        \Config::set('database.connections.VPLS', $currentDBConfigs);
        $this->connection = 'VPLS';

        $this->keyType = 'string';

        parent::__construct();
    }
}
