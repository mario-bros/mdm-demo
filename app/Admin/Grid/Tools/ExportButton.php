<?php

namespace App\Admin\Grid\Tools;

use \Encore\Admin\Grid\Tools\ExportButton as BaseExportButton;

class ExportButton extends BaseExportButton
{
    /**
     * Render Export button.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->grid->showExportBtn()) {
            return '';
        }

        $this->setUpScripts();

        $trans = [
            'export' => trans('admin.export'),
            'current_page' => trans('admin.current_page'),
            'selected_rows' => trans('admin.selected_rows'),
        ];

        $page = request('page', 1);

        return <<<EOT

<div class="btn-group pull-right" style="margin-right: 10px">
    <a href="{$this->grid->getExportUrl('page')}" target="_blank" class="btn btn-sm btn-twitter" title="{$trans['export']}"><i class="fa fa-download"></i><span class="hidden-xs"> {$trans['export']}</span></a>
    <button type="button" class="btn btn-sm btn-twitter dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{$this->grid->getExportUrl('page', $page)}" target="_blank">{$trans['current_page']}</a></li>
        <li><a href="{$this->grid->getExportUrl('selected', '__rows__')}" target="_blank" class='{$this->grid->getExportSelectedName()}'>{$trans['selected_rows']}</a></li>
    </ul>
</div>
EOT;
    }
}
