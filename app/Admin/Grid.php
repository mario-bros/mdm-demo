<?php

namespace App\Admin;

use \Encore\Admin\Grid as BaseGrid;

use App\Admin\Grid\Column;


class Grid extends BaseGrid
{
    protected function addColumn($column = '', $label = '')
    {
        $column = new Column($column, $label);
        $column->setGrid($this);

        return tap($column, function ($value) {
            $this->columns->push($value);
        });
    }

    public function prependColumn($column = '', $label = '')
    {
        $column = new Column($column, $label);
        $column->setGrid($this);

        return tap($column, function ($value) {
            $this->columns->prepend($value);
        });
    }
   
}
