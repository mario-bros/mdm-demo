<?php

namespace App\Model\GlobalReports;

use App\Model\Lookups\MDMBank;
use App\Model\Lookups\MDMCity;
use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

use App\Model\Lookups;

class BankAccount extends Model
{
    protected $table        = 'mdm_customer_bank_account';
	protected $fillable     = [
        'u_id', 
        'nama_bank', 
        'cabang', 
        'nomor_rekening', 
        'atas_nama', 
        'status_keaktifan_id', 
        'status_data', 
        'isPrimary', 
        'created_by', 
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

    // Mengambil relasi untuk show data di table address
    public function namaBank()
    {
        return $this->belongsTo(MDMBank::class, 'nama_bank', 'id');
    }

    public function kotaID()
    {
        return $this->belongsTo(MDMCity::class, 'cabang', 'id');
    }

    public function statusKeaktifanID()
    {
        return $this->belongsTo(Lookups::class, 'status_keaktifan_id', 'id');
    }

    public function statusData()
    {
        return $this->belongsTo(Lookups::class, 'status_data', 'id');
    }
}
