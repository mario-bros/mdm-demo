<?php

namespace App\Model\BusinessUnits;

use App\Model\Lookups\MDMCity;
use Encore\Admin\Facades\Admin;
use App\Model\Lookups\MDMVillage;
use App\Model\Lookups\MDMProvince;
use App\Model\Lookups\MDMDistrict;
use Illuminate\Database\Eloquent\Model;

use App\Model\Lookups;

class Address extends Model
{
    protected $table        = 'mdm_customer_address';
	protected $fillable     = [
        'u_id', 
        'address', 
        'nomor', 
        'blok', 
        'rt', 
        'rw', 
        'kelurahan_id', 
        'kecamatan_id', 
        'kota_id', 
        'propinsi_id', 
        'kodepos', 
        'longitude', 
        'latitude', 
        'status_tempat_tinggal_id', 
        'type_tempat_tinggal_id', 
        'category_tempat_tinggal_id', 
        'status_keaktifan_id', 
        'status_data', 
        'status_alamat', 
        'isPrimary', 
        'created_by', 
        'updated_by',
    ];

    public function __construct() {
        parent::__construct();
        $this->connection = \Session::get('unit_name');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if ( $model->created_by == null) $model->created_by = Admin::user()->id;
        });
    }

    // Mengambil relasi untuk show data di table address
    public function categoryTempatTinggalID()
    {
        return $this->belongsTo(Lookups::class, 'category_tempat_tinggal_id', 'id');
    }

    public function statusKeaktifanID()
    {
        return $this->belongsTo(Lookups::class, 'status_keaktifan_id', 'id');
    }

    public function statusData()
    {
        return $this->belongsTo(Lookups::class, 'status_data', 'id');
    }

    public function statusTempatTinggalID()
    {
        return $this->belongsTo(Lookups::class, 'status_tempat_tinggal_id', 'id');
    }

    public function typeTempatTinggalID()
    {
        return $this->belongsTo(Lookups::class, 'type_tempat_tinggal_id', 'id');
    }

    public function provinsiID()
    {
        return $this->belongsTo(MDMProvince::class, 'propinsi_id', 'id');
    }

    public function kotaID()
    {
        return $this->belongsTo(MDMCity::class, 'kota_id', 'id');
    }

    public function kecamatanID()
    {
        return $this->belongsTo(MDMDistrict::class, 'kecamatan_id', 'id');
    }

    public function kelurahanID()
    {
        return $this->belongsTo(MDMVillage::class, 'kelurahan_id', 'id');
    }
}
