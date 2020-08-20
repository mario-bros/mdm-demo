<?php

namespace App\Model;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Auth\Database\Administrator;

class Product extends Model
{
    protected $table        = 'mdm_customer_product';

	protected $fillable     = [
        'customer_id', 
        'product', 
        'created_by', 
        'updated_by'
    ];

    protected $hidden = ['u_id'];

    protected $connection = 'pgsql';

    protected $primaryKey = 'id'; 

    protected $keyType = 'string';


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_by = Admin::user()->id;
        });
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
        // return 'Y-m-d H:i:s';
    }

    public function customer()
    {
        return $this->belongsTo(Profile::class, 'u_id', 'u_id');
    }
}
