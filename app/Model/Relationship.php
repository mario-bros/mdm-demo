<?php

namespace App\Model;

use App\Model\Lookups\MDMCity;
use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table        = 'mdm_customer_relationship';
	protected $fillable     = [
        'u_id', 
        'first_name', 
        'last_name', 
        'dob', 
        'pob_id', 
        'address', 
        'mobile_phone', 
        'telephone', 
        'email', 
        'gender', 
        'religion_id', 
        'profesi_id', 
        'status_kawin_id', 
        'relationship_id', 
        'category_identity_id', 
        'nomor_identity', 
        'masa_berlaku', 
        'status_data', 
        'created_by', 
        'updated_by',
    ];

    protected $connection = 'mysql';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_by = Admin::user()->id;
        });
    }

    // Akhir dari fungsi untuk memasukan data baru ke masing-masing table relationship
    public function genderID()
    {
        return $this->belongsTo(Lookups::class, 'gender', 'id');
    }

    public function agamaID()
    {
        return $this->belongsTo(Lookups::class, 'religion_id', 'id');
    }

    public function profesiID()
    {
        return $this->belongsTo(Lookups::class, 'profesi_id', 'id');
    }

    public function statusKawinID()
    {
        return $this->belongsTo(Lookups::class, 'status_kawin_id', 'id');
    }

    public function hubunganKeluargaID()
    {
        return $this->belongsTo(Lookups::class, 'relationship_id', 'id');
    }

    public function identitasID()
    {
        return $this->belongsTo(Lookups::class, 'category_identity_id', 'id');
    }

    public function statusData()
    {
        return $this->belongsTo(Lookups::class, 'status_data', 'id');
    }

    public function kotaID()
    {
        return $this->belongsTo(MDMCity::class, 'pob_id', 'id');
    }
}
