<?php
namespace App\Admin\Grid;

use Encore\Admin\Grid\Column as BaseColumn;

use Encore\Admin\Grid\Displayers\Editable;
use Encore\Admin\Grid\Displayers\SwitchDisplay;
use Encore\Admin\Grid\Displayers\SwitchGroup;
use Encore\Admin\Grid\Displayers\Select;
use Encore\Admin\Grid\Displayers\image;
use Encore\Admin\Grid\Displayers\Label;
use Encore\Admin\Grid\Displayers\Button;
use Encore\Admin\Grid\Displayers\Link;
use Encore\Admin\Grid\Displayers\Badge;
use Encore\Admin\Grid\Displayers\Radio;
use Encore\Admin\Grid\Displayers\Checkbox;
use Encore\Admin\Grid\Displayers\Orderable;
use Encore\Admin\Grid\Displayers\Table;
use Encore\Admin\Grid\Displayers\Expand;
use Encore\Admin\Grid\Displayers\Modal;
use Encore\Admin\Grid\Displayers\Carousel;
use Encore\Admin\Grid\Displayers\Downloadable;
use Encore\Admin\Grid\Displayers\Copyable;
use Encore\Admin\Grid\Displayers\QRCode;
use Encore\Admin\Grid\Displayers\Prefix;
use Encore\Admin\Grid\Displayers\Suffix;
use Encore\Admin\Grid\Displayers\Secret;


class Column extends BaseColumn
{
    /**
     * Displayers for grid column.
     *
     * @var array
     */
    public static $displayers = [
        'editable'    => Editable::class,
        'switch'      => SwitchDisplay::class,
        'switchGroup' => SwitchGroup::class,
        'select'      => Select::class,
        'image'       => Image::class,
        'label'       => Label::class,
        'button'      => Button::class,
        'link'        => Link::class,
        'badge'       => Badge::class,
        'progressBar' => Displayers\ProgressBar::class,
        'progress'    => Displayers\ProgressBar::class,
        'radio'       => Radio::class,
        'checkbox'    => Checkbox::class,
        'orderable'   => Orderable::class,
        'table'       => Table::class,
        'expand'      => Expand::class,
        'modal'       => Modal::class,
        'carousel'    => Carousel::class,
        'downloadable'=> Downloadable::class,
        'copyable'    => Copyable::class,
        'qrcode'      => QRCode::class,
        'prefix'      => Prefix::class,
        'suffix'      => Suffix::class,
        'secret'      => Secret::class,
    ];
}
