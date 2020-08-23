<?php

namespace App\Model;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'mdm_customer_unit';
    // protected $table        = 'mdm_customer_unitCopy';
    // protected $table        = 'mdm_customer_unit';
	protected $fillable     = [
        'u_id', 
        'unit', 
        'status_keaktifan_id', 
        'url_profile', 
        'Load_Date', 
        'customer_id', 
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
                        'u_id',
                        // 'status_keaktifan_id',
                        'mdm_id', 
                        'created_by', 
                        'updated_by', 
                        'created_at', 
                        'updated_at', 
                        'statusKeaktifanID'
                    ];

    protected $connection = 'mysql';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_by = Admin::user()->id;
        });
    }

    // Mengambil relasi untuk show data di table unit
    public function unitID()
    {
        return $this->belongsTo(Lookups::class, 'unit_id', 'id');
    }

    public function statusKeaktifanID()
    {
        return $this->belongsTo(Lookups::class, 'status_keaktifan_id', 'id');
    }
}
