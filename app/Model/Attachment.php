<?php

namespace App\Model;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    // protected $table        = 'mdm_dev.mdm_customer_attachmentCopy';
    protected $table        = 'mdm_customer_attachment';
	protected $fillable     = [
        'u_id', 
        'customer_identity_id', 
        'filename', 
        'type_file_id', 
        'description', 
        'created_by', 
        'updated_by',
    ];

    protected $connection = 'pgsql';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_by = Admin::user()->id;
        });
    }

    // Mengambil relasi untuk show data di table address
    public function typeFileID()
    {
        return $this->belongsTo(Lookups::class, 'type_file_id', 'id');
    }
}
