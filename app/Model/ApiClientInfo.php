<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApiClientInfo extends Model
{
    protected $table = 'mdm_apiclientinfo';

	protected $fillable     = [
        'name', 
        'api_token', 
        'description', 
        'owner'
    ];

    protected $connection = 'pgsql';

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $model->created_by = Admin::user()->id;
    //     });
    // }
}
