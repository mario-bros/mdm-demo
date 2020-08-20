<?php

namespace App\Model\BusinessUnits;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

use App\Model\Lookups;

class Unit extends Model
{
    protected $table        = 'mdm_customer_unit';
    // protected $table        = 'mdm_customer_unitCopy';
    // protected $table        = 'mdm_customer_unit';
	protected $fillable     = [
        'u_id', 
        'unit_id', 
        'status_keaktifan_id', 
        'url_profile', 
        'Load_Date', 
        'customer_id', 
        'created_by',
    ];

    public function __construct(){
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
