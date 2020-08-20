<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;

class EditedCertified extends RowAction
{
    public $name = 'Edited Certified';


    /**
     * @return string
     */
    public function href()
    {
        $uID = $this->row()->u_id;

        return route('edited_certified.edit', $uID);
    }
}
