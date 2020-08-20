<?php
namespace App\Admin\Controllers\Modules;

use App\Admin\Grid;
use Encore\Admin\Form;
use App\Model\Lookups;
use Encore\Admin\Controllers\AdminController;

class LookupController extends AdminController
{
    protected $title = 'Lookups Info';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Lookups());

        $grid->lookup_name();
        $grid->category();
        $grid->priority();
        $grid->kode();
        $grid->parent_kode();

        $grid->expandFilter();
        $grid->disableExport();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();

            $filter->column(1 / 2, function ($filter) {
                $filter->ilike('lookup_name', __('Lookup Name'));
                $filter->equal('category')->select( Lookups::pluck('category', 'category') );
                $filter->ilike('kode', __('Kode'));
                $filter->ilike('description', __('Deskripsi'));
            });
        });

        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Lookups);
        $form->display('id', 'ID');

        $form->text('lookup_name', 'Lookup Name');
        $form->select('category', __('Category'))->options(Lookups::all()->pluck('category', 'category'));
        $form->hidden('priority');
        /*$form->text('kode', 'Kode');
        $form->text('parent_kode', 'Parent Kode');*/

        $form->saving(function (Form $form) {
            $lastPriority = Lookups::where('category', $form->category)->orderBy('priority', 'desc')->first();
            $form->priority = $lastPriority->priority + 1;
        });

        return $form;
    }

}
