<?php
namespace App\Admin\Grid\Tools;

use Encore\Admin\Grid\Tools\FixColumns;
use App\Admin\GridCompare;
use Encore\Admin\Admin;
/*
use Illuminate\Support\Collection;*/

class FixColumnsCompare extends FixColumns
{

    protected $view = 'admin::grid.fixed-transposed-table';

    protected function addScript()
    {
        $script = <<<SCRIPT

(function () {
    var theadHeight = $('.table-main thead tr').outerHeight();
    $('.table-fixed thead tr').outerHeight(theadHeight);
    
    var tfootHeight = $('.table-main tfoot tr').outerHeight();
    $('.table-fixed tfoot tr').outerHeight(tfootHeight);
    
    $('.table-main tbody tr').each(function(i, obj) {
        var height = $(obj).outerHeight();

        $('.table-fixed-left tbody tr').eq(i).outerHeight(height);
    });
    
    if ($('.table-main').width() >= $('.table-main').prop('scrollWidth')) {
        $('.table-fixed').hide();
    }
    
    $('.table-wrap tbody tr').on('mouseover', function () {
        var index = $(this).index();
        
        $('.table-main tbody tr').eq(index).addClass('active');
        $('.table-fixed-left tbody tr').eq(index).addClass('active');
    });
    
    $('.table-wrap tbody tr').on('mouseout', function () {
        var index = $(this).index();
        
        $('.table-main tbody tr').eq(index).removeClass('active');
        $('.table-fixed-left tbody tr').eq(index).removeClass('active');
    });
})();

SCRIPT;

        Admin::script($script, true);

        return $this;
    }

    protected function addStyle()
    {
        $style = <<<'STYLE'
.tables-container {
    position:relative;
}

.tables-container table {
    margin-bottom: 0px !important;
}

.tables-container table th, .tables-container table td {
    white-space:nowrap;
}

.table-wrap table tr .active {
    background': #f5f5f5;
}

.table-main {
    overflow-x: auto;
    width: 100%;
}

.table-fixed {
    position:absolute;
	top: 0px;
	background:#ffffff;
	z-index:10;
}

.table-fixed-left {
	left:0;
	box-shadow: 7px 0 5px -5px rgba(0,0,0,.12);
}
STYLE;

        Admin::style($style);

        return $this;
    }
}
