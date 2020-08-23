<?php

namespace App\Model;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Auth\Database\Administrator;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Profile extends Model
{
    use Cachable;

    protected $cacheCooldownSeconds = 10;

    protected $table        = 'mdm_customer_profile';
    // protected $table        = 'mdm_customer_profileCopy';
    // protected $table        = 'mdm_dev.mdm_customer_profile';
	protected $fillable     = [
        'full_name', 
        'first_name', 
        'middle_name', 
        'last_name', 
        'surname', 
        'nickname', 
        'gender', 
        'dob', 
        'pob_id', 
        'suku_id', 
        'kewarganegaraan_id', 
        'negara_id', 
        'religion_id', 
        'pendidikan_id', 
        'profesi_id', 
        'golongan_darah_id', 
        'status_kawin_id', 
        'mortalitas_id', 
        'status_keaktifan_id', 
        'status_pengkinian_data_id', 
        'category_user_id', 
        'foto', 
        'email', 
        'created_by', 
        'customer_id', 
        'flag_process', 
        'updated_by',
    ];

    protected $hidden = ['u_id'];

    protected $connection = 'mysql';
    
    // Solusi sementara
    // protected $primaryKey = 'u_id'; 
    protected $primaryKey = 'id'; 

    protected $keyType = 'string';

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_by = Admin::user()->id;
            $model->flag_process = 0;
        });
    }

    public function getDateFormat()
    {
        // return 'Y-m-d H:i:s.u';
        return 'Y-m-d H:i:s';
    }  

    // Fungsi untuk memasukan data baru ke masing-masing table customer
    public function address()
    {
        return $this->hasMany(Address::class, 'u_id', 'u_id')->orderBy('id');
    }

    public function contact()
    {
        return $this->hasMany(Contact::class, 'u_id', 'u_id')->orderBy('id');
    }

    public function identity()
    {
        return $this->hasMany(Identity::class, 'u_id', 'u_id')->orderBy('id');
    }

    public function bank()
    {
        return $this->hasMany(BankAccount::class, 'u_id', 'u_id')->orderBy('id');
    }

    public function unit()
    {
        return $this->hasMany(Unit::class, 'u_id', 'u_id');
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class, 'u_id', 'u_id')->orderBy('id');
    }

    public function relationship()
    {
        return $this->hasMany(Relationship::class, 'u_id', 'u_id')->orderBy('id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'u_id', 'u_id')->orderBy('id');
    }

    // Akhir dari fungsi untuk memasukan data baru ke masing-masing table customer
    public function genderID()
    {
        return $this->belongsTo(Lookups::class, 'gender', 'id');
    }

    public function CategoryUser()
    {
        return $this->belongsTo(Lookups::class, 'category_user_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Administrator::class, 'created_by', 'id');
    }

    // Mengambil relasi untuk show data di table profile
    public function statusKawinID()
    {
        return $this->belongsTo(Lookups::class, 'status_kawin_id', 'id');
    }

    public function mortalitasID()
    {
        return $this->belongsTo(Lookups::class, 'mortalitas_id', 'id');
    }

    public function kewarganegaraanID()
    {
        return $this->belongsTo(Lookups::class, 'kewarganegaraan_id', 'id');
    }

    public function negaraID()
    {
        return $this->belongsTo(Lookups::class, 'negara_id', 'id');
    }

    public function agamaID()
    {
        return $this->belongsTo(Lookups::class, 'religion_id', 'id');
    }

    public function sukuID()
    {
        return $this->belongsTo(Lookups::class, 'suku_id', 'id');
    }

    public function pendidikanID()
    {
        return $this->belongsTo(Lookups::class, 'pendidikan_id', 'id');
    }

    public function profesiID()
    {
        return $this->belongsTo(Lookups::class, 'profesi_id', 'id');
    }

    public function golonganDarahID()
    {
        return $this->belongsTo(Lookups::class, 'golongan_darah_id', 'id');
    }
}
