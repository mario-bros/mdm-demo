<?php
namespace App\Admin\Grid\Tools;

use \Encore\Admin\Grid\Tools\BatchActions as BaseBatchActions;

class BatchActions extends BaseBatchActions
{

    // private $isHoldSelectAllCheckbox = false;

    /**
     * BatchActions constructor.
     */
    /*public function __construct()
    {
        $this->actions = new Collection();

        $this->appendDefaultAction();
    }*/

    protected function appendDefaultAction()
    {
        // $this->add(new BatchDelete(trans('admin.batch_delete')));
    }

    protected function script()
    {
        $allName = $this->grid->getSelectAllName();
        $rowName = $this->grid->getGridRowName();

        // $selected = trans('admin.grid_items_selected');

        return <<<EOT

$('.{$allName}').iCheck({checkboxClass:'icheckbox_minimal-blue'});

$('.{$allName}').on('ifChanged', function(event) {
    if (this.checked) {
        $('.{$rowName}-checkbox').iCheck('check');
    } else {
        $('.{$rowName}-checkbox').iCheck('uncheck');
    }
}).on('ifClicked', function () {
    if (this.checked) {
        $.admin.grid.selects = {};
    } else {
        $('.{$rowName}-checkbox').each(function () {
            var id = $(this).data('id');
            $.admin.grid.select(id);
        });
    }

    $('.{$allName}-btn').hide();
});

EOT;
    }
}
