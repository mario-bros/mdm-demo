<?php

namespace App\Model\Lookups\BusinessUnits\Sekuritas;

use Illuminate\Database\Eloquent\Model;

class MDMProvinceSekuritas extends Model
{
    protected $table = 'mdm_master_provinsi_seku';
	protected $fillable = [
	    'province_no', 'description'
    ];

    protected $primaryKey = 'province_no';
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
