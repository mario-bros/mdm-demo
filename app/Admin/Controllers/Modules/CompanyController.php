<?php
namespace App\Admin\Controllers\Modules;

use Encore\Admin\Grid;
use Encore\Admin\Form;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;

use App\Model\MasterCompany;

use Illuminate\Support\Str;

class CompanyController extends AdminController
{
    protected $title = 'Master Company';

    public function edit($id, Content $content)
    {
        if ($id == 'TEST') {
            return redirect()->back();
        }

        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id));
    }

    /**
     * Show interface.
     *
     * @param $id
     * @return Content
     */
    protected function detail($id)
    {
        if ($id == 'TEST') {
            return redirect()->back();
        }

        $show = new Show(MasterCompany::findOrFail($id));

        $show->id('ID');
        $show->full_name('Full Name');
        $show->isHolding('Holding Status');
        $show->address()->unescape()->as(function ($address) {
            return '<textarea rows="4" cols="120" disabled>' . $address . '</textarea>';
        });
        $show->website('Website URL');
        $show->brand_name('Brand Name');
        $show->email('Email');
        $show->holding('Holding');
        $show->last_update('Last Update');
        $show->pic1_name('PIC 1 Name');
        $show->pic1_email('PIC 1 Email');
        $show->pic1_hp('PIC 1 Phone No.');
        $show->pic2_name('PIC 2 Name');
        $show->pic2_email('PIC 2 Email');
        $show->pic2_hp('PIC 2 Phone No.');


        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableDelete();
            });

        return $show;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MasterCompany());

        $grid->column('id', 'ID')->sortable();
        $grid->column('brand_name', 'Brand Name');
        $grid->column('email', 'Email');
        $grid->column('website', 'Website URL');
        $grid->column('last_update', 'Last Update');

        $grid->model()->whereNotIn('id', ['TEST']);

        $grid->expandFilter();
        $grid->disableExport();
        $grid->disableCreateButton();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->column(1 / 2, function ($filter) {
                $filter->like('full_name', __('Full Name'));
                $filter->like('brand_name', __('Brand Name'));
                $filter->between('last_update', __('Last Update Between'))->date();
            });
        });

        $grid->actions(function ($actions) {
            // $actions->disableView();
            if ( Admin::user()->inRoles(['holding', 'moderator', 'administrator']) == false) {
                // If the user is unauthorized, then hide the edit button
                $actions->disableEdit();
            }
            
            $actions->disableDelete();
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
        $form = new Form(new MasterCompany());

        $form->display('id', 'ID');
        $form->text('full_name', 'Full Name')->rules('required');
        $form->select('isholding', 'Holding ?' )->options([ 'Y' => 'Y', 'N' => 'N']);
        $form->textarea('address', 'Address');
        $form->text('website', 'Website URL');
        $form->text('brand_name', 'Brand Name');
        $form->text('email', 'Email');
        $form->text('holding', 'Holding');
        $form->text('pic1_name', 'PIC 1 Name');
        $form->text('pic1_email', 'PIC 1 Email');
        $form->text('pic1_hp', 'PIC 1 Phone No.');
        $form->text('pic2_name', 'PIC 2 Name');
        $form->text('pic2_email', 'PIC 2 Email');
        $form->text('pic2_hp', 'PIC 2 Phone No.');

        $form->disableEditingCheck();
        $form->disableCreatingCheck();
        $form->disableViewCheck();

        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
        });

        // dd($form);
        return $form;
    }

    public function destroy($id)
    {
        $response = [
            'status'  => false,
            'message' => trans('admin.delete_failed'),
        ];

        return response()->json($response);
    }
}
