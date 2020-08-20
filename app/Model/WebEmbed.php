<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebEmbed extends Model
{
    protected $table = 'mdm_web_embed';
	protected $fillable = [
        'url', 
        'created_date'
    ];

    protected $connection = 'pgsql';
    public $timestamps = false;
}