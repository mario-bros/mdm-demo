<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;

class Detail extends RowAction
{
    public $name = 'Detail';

    /**
     * @return string
     */
    public function href()
    {
        $uID = $this->row()->u_id;

        return route('detail', $uID);
    }
}
