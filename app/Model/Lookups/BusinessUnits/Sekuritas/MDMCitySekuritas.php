<?php

namespace App\Model\Lookups\BusinessUnits\Sekuritas;

use Illuminate\Database\Eloquent\Model;

class MDMCitySekuritas extends Model
{
    protected $table = 'mdm_master_kota_seku';
	protected $fillable = [
	    'city_no', 'description'
    ];

    protected $primaryKey = 'city_no';
    // protected $keyType = 'string';

    public function __construct() 
    {
        $currentDBConfigs = $this->setDBConnectionConfig('SEKU');
        \Config::set('database.connections.SEKU', $currentDBConfigs);
        $this->connection = 'SEKU';

        parent::__construct();
    }

    protected function setDBConnectionConfig($confPath)
    {
        $arr = [];
        $folderPath = base_path() . '/config/database/business-units';
        foreach (scandir($folderPath) as $filename) {

            $filePath = $folderPath . '/' . $filename;
            if (is_file($filePath)) {
                $arr += include $filePath;
            }
        }

        return $arr[$confPath];
    }
}
