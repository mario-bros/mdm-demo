<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;

class CompareGoldenRecord extends RowAction
{

    // protected $method = 'GET';

    public $name = 'Compare Golden Record';


    /**
     * @return string
     */
    public function href()
    {
        $uID = $this->row()->u_id;

        return route('compare-golden-record', $uID);
    }

    public function render()
    {
        if ($href = $this->href()) {
            return "<a href='{$href}' target='_blank'>{$this->name()}</a>";
        }

        $this->addScript();

        $attributes = $this->formatAttributes();

        return sprintf(
            "<a data-_key='%s' href='javascript:void(0);' class='%s' {$attributes}>%s</a>",
            $this->getKey(),
            $this->getElementClass(),
            $this->asColumn ? $this->display($this->row($this->column->getName())) : $this->name()
        );
    }
}
