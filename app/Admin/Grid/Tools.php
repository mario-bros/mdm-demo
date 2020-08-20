<?php
namespace App\Admin\Grid;

use Encore\Admin\Grid\Tools as BaseTools;
use App\Admin\Grid\Tools\BatchActions;

class Tools extends BaseTools
{
    protected function script()
    {
        return '';
    }

    protected function appendDefaultTools()
    {
        /*$batchActions = new BatchActions();
        $batchActions->disableDeleteAndHodeSelectAll();

        $this->append($batchActions);*/
        $this->append(new BatchActions());
    }
}
