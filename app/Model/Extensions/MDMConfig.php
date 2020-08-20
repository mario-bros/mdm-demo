<?php

namespace App\Model\Extensions;

use Illuminate\Database\Eloquent\Model;

class MDMConfig extends Model
{
    public $timestamps  = false;
    public $table       = 'mdm_config';
    protected $fillable = [
	    'type', 'code', 'key', 'value', 'sort', 'detail'
    ];

    protected $connection = 'pgsql';

    /*public function __construct()
    {
        parent::__construct();

        $this->connection = 'pgsql';
        $this->primaryKey = 'u_id';
        $this->keyType = 'string';
    }*/

    /**
     * [getExtensionsGroup description]
     * @param  [type]  $group      [description]
     * @param  boolean $onlyActive [description]
     * @return [type]              [description]
     */
    public static function getExtensionsGroup($group, $onlyActive = true)
    {
        $return = self::where('code', $group);
        if ($onlyActive) {
            $return = $return->where('value', 1);
        }
        $return = $return->orderBy('sort', 'asc')
            ->get()->keyBy('key');
        return $return;
    }

}
