<?php

namespace App\Model\Extensions;

use Illuminate\Database\Eloquent\Model;

class MDMEmailTemplate extends Model
{
    protected $table = 'admin_email_template';
	protected $fillable = [
	    'name', 'group', 'text', 'status'
    ];

    protected $connection = 'pgsql';
}
