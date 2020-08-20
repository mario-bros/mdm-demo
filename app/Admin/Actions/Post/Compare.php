<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;

class Compare extends RowAction
{
    public $name = 'Compare';


    /**
     * @return string
     */
    public function href()
    {
        $uID = $this->row()->id;

        return route('compare.edit', $uID);
    }
}
