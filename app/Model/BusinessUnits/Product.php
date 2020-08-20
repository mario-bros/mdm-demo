<?php

namespace App\Model\BusinessUnits;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'mdm_staging_customer_product';

    public $timestamps = false;

    // protected $primaryKey = ['customer_id', 'product_code'];
    // protected $primaryKey = null;
    protected $primaryKey = 'customer_id';

    public $incrementing = false;

	protected $fillable = [
        'customer_id', 
        'product_code', 
        'product_desc'
    ];

    public function __construct(){
        parent::__construct();
        $this->connection = \Session::get('unit_name');

        if ($this->connection == 'pgsql' && !Session('edit_certified')) {
            // $this->primaryKey = 'u_id';
            // $this->keyType = 'string';
        }
    }

    // Akhir dari fungsi untuk memasukan data baru ke masing-masing table customer
    public function customerID()
    {
        return $this->belongsTo(Profile::class, 'customer_id', 'customer_id');
    }
}