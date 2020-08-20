<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Lookups;
use App\Model\Lookups\MDMVillage;
use App\Model\Lookups\MDMDistrict;
use App\Model\Lookups\MDMCity;
use App\Model\Lookups\MDMProvince;


class ProfileWeb extends Model
{
    protected $table = 'mdm_customer_profile_web';

    protected $connection = 'pgsql';

    // Solusi sementara
    // protected $primaryKey = 'u_id'; 
    protected $primaryKey = 'id'; 

    protected $keyType = 'string';

    protected $appends = [
        'alias_gender',
        'alias_kelurahan',
        'alias_kecamatan',
        'alias_kota',
        'alias_propinsi',
        'alias_status_tempat_tinggal',
        'alias_type_tempat_tinggal',
        'alias_category_tempat_tinggal',
        'alias_category_identity',
        'alias_suku',
        'alias_kewarganegaraan',
        'alias_negara',
        'alias_agama',
        'alias_pendidikan',
        'alias_profesi',
        'alias_golongan_darah',
        'alias_status_kawin',
        'alias_mortalitas',
        'alias_category_user',
        'alias_status_keaktifan',
        'alias_status_pengkinian_data'
    ];

    public function getAliasGenderAttribute()
    {
        if ( $this->gender !== null) {
            return ($this->gender == 1) ? 'LAKI-LAKI' : 'PEREMPUAN';
        } else {
            return '';
        }
    }

    public function getAliasKelurahanAttribute()
    {
        if ( $this->kelurahan_id !== null) {
            $lookupCollection = MDMVillage::pluck('name', 'id');
            return $lookupCollection[$this->kelurahan_id];
        } else {
            return '';
        }
    }

    public function getAliasKecamatanAttribute()
    {
        if ( $this->kecamatan_id !== null) {
            $lookupCollection = MDMDistrict::pluck('name', 'id');
            return $lookupCollection[$this->kecamatan_id];
        } else {
            return '';
        }
    }

    public function getAliasKotaAttribute()
    {
        if ( $this->kota_id !== null) {
            $lookupCollection = MDMCity::pluck('name', 'id');
            return $lookupCollection[$this->kota_id];
        } else {
            return '';
        }
    }

    public function getAliasPropinsiAttribute()
    {
        if ( $this->propinsi_id !== null) {
            $lookupCollection = MDMProvince::pluck('name', 'id');
            return $lookupCollection[$this->propinsi_id];
        } else {
            return '';
        }
    }

    public function getAliasStatusTempatTinggalAttribute()
    {
        if ( $this->status_tempat_tinggal_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Status Tempat Tinggal'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->status_tempat_tinggal_id];
        } else {
            return '';
        }
    }

    public function getAliasTypeTempatTinggalAttribute()
    {
        if ( $this->type_tempat_tinggal_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Type Tempat Tinggal'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->type_tempat_tinggal_id];
        } else {
            return '';
        }
    }

    public function getAliasCategoryTempatTinggalAttribute()
    {
        if ( $this->category_tempat_tinggal_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Category Tempat Tinggal'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->category_tempat_tinggal_id];
        } else {
            return '';
        }
    }

    public function getAliasCategoryIdentityAttribute()
    {
        if ( $this->category_identity_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Category Identity'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->category_identity_id];
        } else {
            return '';
        }
    }

    public function getAliasSukuAttribute()
    {
        if ( $this->suku_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Suku'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->suku_id];
        } else {
            return '';
        }
    }

    public function getAliasKewarganegaraanAttribute()
    {
        if ( $this->kewarganegaraan_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Kewarganegaraan'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->kewarganegaraan_id];
        } else {
            return '';
        }
    }

    public function getAliasNegaraAttribute()
    {
        if ( $this->negara_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Negara'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->negara_id];
        } else {
            return '';
        }
    }

    public function getAliasAgamaAttribute()
    {
        if ( $this->religion_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Agama'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->religion_id];
        } else {
            return '';
        }
    }

    public function getAliasPendidikanAttribute()
    {
        if ( $this->pendidikan_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Pendidikan'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->pendidikan_id];
        } else {
            return '';
        }
    }

    public function getAliasProfesiAttribute()
    {
        if ( $this->profesi_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Profesi'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->profesi_id];
        } else {
            return '';
        }
    }

    public function getAliasGolonganDarahAttribute()
    {
        if ( $this->golongan_darah_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Golongan Darah'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->golongan_darah_id];
        } else {
            return '';
        }
    }

    public function getAliasStatusKawinAttribute()
    {
        if ( $this->status_kawin_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Status Kawin'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->status_kawin_id];
        } else {
            return '';
        }
    }

    public function getAliasMortalitasAttribute()
    {
        if ( $this->mortalitas_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Mortalitas'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->mortalitas_id];
        } else {
            return '';
        }
    }

    public function getAliasCategoryUserAttribute()
    {
        if ( $this->category_user_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Category User'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->category_user_id];
        } else {
            return '';
        }
    }

    public function getAliasStatusKeaktifanAttribute()
    {
        if ( $this->status_keaktifan_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Status Keaktifan'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->status_keaktifan_id];
        } else {
            return '';
        }
    }

    public function getAliasStatusPengkinianDataAttribute()
    {
        if ( $this->status_pengkinian_data_id !== null) {
            $lookupCollection = Lookups::where('category', strtoupper('Status Pengkinian Data'))->pluck('lookup_name', 'id');
            return $lookupCollection[$this->status_pengkinian_data_id];
        } else {
            return '';
        }
    }

    public function getTableColumns() 
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getDateFormat()
    {
        // return 'Y-m-d H:i:s.u';
        return 'Y-m-d H:i:s';
    }

    public function businessUnits()
    {
        // return $this->hasMany(ProfileWeb::class, 'uid_golden', 'uid_golden');
        return $this->hasMany(ProfileWeb::class, 'uid_golden', 'uid_golden')->select(['u_id', 'unit']);
    }

    public function addresses()
    {
        // return $this->hasMany(ProfileWeb::class, 'uid_golden', 'uid_golden')->select(['uid_golden', 'address', 'nomor', 'blok', 'rt', 'rw', 'kelurahan_id', 'kecamatan_id', 'kota_id', 'propinsi_id', 'kodepos', 'longitude', 'latitude', 'status_tempat_tinggal_id', 'type_tempat_tinggal_id', 'category_tempat_tinggal_id', 'status_keaktifan_id'])->where('mdm_customer_profile_web.golden', 'Y');
        return $this->hasMany(Address::class, 'uid_golden', 'uid_golden');
    }

    public function contacts()
    {
        return $this->hasMany(ProfileWeb::class, 'uid_golden', 'uid_golden')->select(['uid_golden', 'email1', 'email2', 'telepon_rumah', 'telepon_kantor', 'fax']);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'uid_golden', 'uid_golden')->select(['uid_golden', 'customer_id', 'product']);
    }

    public function getFormattedIdentityNo()
    {
        return (string) $this->ktp;
    }
}
