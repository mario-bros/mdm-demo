<?php

namespace App\Model\GlobalReports;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

use App\Model\Lookups;

class Contact extends Model
{
    protected $table        = 'mdm_customer_contact';
	protected $fillable     = [
        'u_id', 
        'contact_value', 
        'type_contact_id', 
        'status_keaktifan_id', 
        'status_verifikasi_id', 
        'verified_at', 
        'status_data', 
        'isPrimary', 
        'updated_by',
    ];

    protected $connection = 'report';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_by = Admin::user()->id;
        });
    }

    // Mengambil relasi untuk show data di table contact
    public function tipeKontak()
    {
        return $this->belongsTo(Lookups::class, 'type_contact_id', 'id');
    }

    public function statusKeaktifanID()
    {
        return $this->belongsTo(Lookups::class, 'status_keaktifan_id', 'id');
    }
}
