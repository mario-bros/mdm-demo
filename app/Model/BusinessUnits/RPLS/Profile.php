<?php

namespace App\Model\BusinessUnits\RPLS;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct()
    {
        $currentDBConfigs = $this->setDBConnectionConfig('RPLS');
        \Config::set('database.connections.RPLS', $currentDBConfigs);
        $this->connection = 'RPLS';

        $this->keyType = 'string';

        parent::__construct();
    }
}
