<?php

namespace App\Model\BusinessUnits\SEKU;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct()
    {
        $currentDBConfigs = $this->setDBConnectionConfig('SEKU');
        \Config::set('database.connections.SEKU', $currentDBConfigs);
        // dd( \Config::get('database.connections.SEKU') );
        $this->connection = 'SEKU';

        $this->keyType = 'string';

        parent::__construct();
    }
}
