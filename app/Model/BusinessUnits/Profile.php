<?php

namespace App\Model\BusinessUnits;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'mdm_staging_customer_profile';
    public $timestamps = false;

    protected $primaryKey = 'u_id';

    protected $fillable     = [
        'u_id', 
        'unit', 
        'customer_id', 
        'first_name', 
        'middle_name', 
        'last_name', 
        'surname', 
        'nickname', 
        'gender', 
        'dob', 
        'pob', 
        'address', 
        'nomor', 
        'blok', 
        'rt', 
        'rw', 
        'kelurahan', 
        'kecamatan', 
        'kota', 
        'propinsi', 
        'kodepos', 
        'longitude', 
        'latitude', 
        'status_tempat_tinggal', 
        'type_tempat_tinggal', 
        'category_tempat_tinggal', 
        'email1', 
        'email2', 
        'telepon_rumah', 
        'telepon_kantor', 
        'fax', 
        'mobile_phone1', 
        'mobile_phone2', 
        'ktp', 
        'suku', 
        'kewarganegaraan', 
        'negara', 
        'religion', 
        'pendidikan', 
        'profesi', 
        'golongan_darah', 
        'status_kawin', 
        'mortalitas', 
        'status_keaktifan', 
        'status_pengkinian_data', 
        'product', 
        'flag_process', 
        'process_at', 
        'category', 
        'id_type', 
        'home_address_2', 
        'kode_pos', 
        'home_country',
        'current_position',
        'annual_income',
        'source_of_addl_income',
        'additional_income',
    ];

    protected $appends = [
        'masking_full_name',
        'masking_first_name',
        'masking_middle_name',
        'masking_last_name',
        'masking_surname',
        'masking_nickname',
        'masking_pob',
        'masking_address',
        'masking_nomor',
        'masking_blok',
        'masking_rt',
        'masking_rw',
        'masking_kelurahan',
        'masking_kecamatan',
        'masking_kodepos',
        'masking_longitude',
        'masking_latitude',
        'masking_status_tempat_tinggal',
        'masking_type_tempat_tinggal',
        'masking_category_tempat_tinggal',
        'masking_email1',
        'masking_email2',
        'masking_telepon_rumah',
        'masking_telepon_kantor',
        'masking_fax',
        'masking_mobile_phone1',
        'masking_mobile_phone2',
        'masking_ktp',
        'masking_suku',
        'masking_kewarganegaraan',
        'masking_negara',
        'masking_religion',
        'masking_pendidikan',
        'masking_profesi',
        'masking_golongan_darah',
        'masking_status_kawin',
        'masking_mortalitas',
        'masking_category_user',
        'masking_product',
        'masking_category',
        'masking_home_address_2',

        'alias_gender',
        'alias_status_tempat_tinggal',
        'alias_type_tempat_tinggal',
        'alias_category_tempat_tinggal',
        'alias_id_type',
        'alias_kewarganegaraan',
        'alias_religion',
        'alias_profesi',
        'alias_golongan_darah',
        'alias_status_kawin'
    ];

    public function __construct() 
    {
        $this->keyType = 'string';

        parent::__construct();
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_at = date('Y-m-d H:i:s.u', time());
        });
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

    protected function setDBConnectionConfig($confPath = 'TEST')
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

    public function getFormattedIdentityNo()
    {
        return (string) $this->ktp;
    }
}
