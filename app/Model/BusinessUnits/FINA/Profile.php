<?php

namespace App\Model\BusinessUnits\FINA;

use App\Model\BusinessUnits\Profile as BaseProfile;
use App\Traits\MaskingTraits;
use App\Traits\BusinessUnitAliasTraits;

class Profile extends BaseProfile
{
    use MaskingTraits, BusinessUnitAliasTraits;

    public function __construct() 
    {
        // $currentConfigs = Config::get('database.connections.customers');

        // $currentConfigs['database'] = 'db_A'; //this varies depending on the request
        // $currentConfigs['prefix'] = 'custName'; //this varies depending on the request

        $currentDBConfigs = $this->setDBConnectionConfig('FINA');
        \Config::set('database.connections.FINA', $currentDBConfigs);
        $this->connection = 'FINA';

        $this->keyType = 'string';

        parent::__construct();
    }

}
