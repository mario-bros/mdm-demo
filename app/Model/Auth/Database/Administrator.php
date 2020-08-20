<?php
namespace App\Model\Auth\Database;

use Encore\Admin\Auth\Database\Administrator as BaseAdmin;
// use App\Model\Lookups;
use App\Model\MasterCompany;

/**
 * Class Administrator.
 *
 * @property Role[] $roles
 */
class Administrator extends BaseAdmin
{
    protected $fillable = ['username', 'password', 'name', 'avatar', 'unit_id', 'email'];

    /**
     * A User has and belongs to many permissions.
     *
     * @return BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(MasterCompany::class, 'unit_id', 'id');
    }
}
