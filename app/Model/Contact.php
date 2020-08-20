<?php

namespace App\Model;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

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

    protected $hidden = [
                        'u_id', 
                        // 'type_contact_id', 
                        // 'status_keaktifan_id', 
                        'status_verifikasi_id', 
                        'mdm_id', 
                        'created_by', 
                        'updated_by', 
                        'created_at', 
                        'updated_at', 
                        'tipeKontak'
                    ];


    protected $connection = 'pgsql';

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
