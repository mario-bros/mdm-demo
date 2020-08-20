<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;

class EditedStaging extends RowAction
{
    public $name = 'Edited Staging';


    /**
     * @return string
     */
    public function href()
    {
        $uID = $this->row()->id;

        return route('edited_staging.edit', $uID);
    }
}
