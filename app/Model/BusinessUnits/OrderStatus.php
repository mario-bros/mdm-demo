<?php

namespace App\Model\BusinessUnits;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Auth\Database\Administrator;

class OrderStatus extends Model
{
    protected $table        = 'mdm_customer_status';
	protected $fillable     = [
        'u_id', 
        'message', 
        'flag_process', 
        'user_id', 
        'is_rejected'
    ];

    public function __construct(){
        parent::__construct();
        $this->connection = \Session::get('unit_name');
    }

    public function user()
    {
        return $this->belongsTo(Administrator::class, 'user_id', 'id');
    }

    public function getUID()
    {
        return $this->belongsTo(Profile::class, 'u_id', 'u_id');
    }

    public function identity()
    {
        return $this->hasMany(Identity::class, 'u_id', 'u_id');
    }

    public function contact()
    {
        return $this->hasMany(Contact::class, 'u_id', 'u_id');
    }

    public function unit()
    {
        return $this->hasMany(Unit::class, 'u_id', 'u_id');
    }
}
