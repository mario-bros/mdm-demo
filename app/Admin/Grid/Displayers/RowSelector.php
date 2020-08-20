<?php
namespace App\Admin\Grid\Displayers;

use Encore\Admin\Grid\Displayers\RowSelector as BaseRowSelector;

class RowSelector extends BaseRowSelector
{
    protected function script()
    {
        $allName = $this->grid->getSelectAllName();
        $rowName = $this->grid->getGridRowName();

        return <<<EOT
$('.{$rowName}-checkbox').iCheck({checkboxClass:'icheckbox_minimal-blue'}).on('ifChanged', function () {
    
    var id = $(this).data('id');

    if (this.checked) {
        \$.admin.grid.select(id);
        $(this).closest('tr').css('background-color', '#ffffd5');
    } else {
        \$.admin.grid.unselect(id);
        $(this).closest('tr').css('background-color', '');
    }
}).on('ifClicked', function () {
    
    var id = $(this).data('id');
    
    if (this.checked) {
        $.admin.grid.unselect(id);
    } else {
        $.admin.grid.select(id);
    }
    
    $('.{$allName}-btn').hide();
});

EOT;
    }
}
