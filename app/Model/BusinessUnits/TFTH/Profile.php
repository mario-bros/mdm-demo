<?php

namespace App\Model\BusinessUnits\TFTH;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct()
    {
        $currentDBConfigs = $this->setDBConnectionConfig('TFTH');
        \Config::set('database.connections.TFTH', $currentDBConfigs);
        $this->connection = 'TFTH';

        $this->keyType = 'string';

        parent::__construct();
    }
}
