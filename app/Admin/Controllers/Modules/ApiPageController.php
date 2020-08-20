<?php
// copy of CustomerController
namespace App\Admin\Controllers\Modules;

use Encore\Admin\Grid;
use Encore\Admin\Form;
use Encore\Admin\Show;
use App\Model\MasterCompany;

use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\AdminController;

use Illuminate\Support\Str;

class ApiPageController extends AdminController
{
    protected $title = 'Business Unit Setting';

    /**
     * Create interface.
     *
     * @return Content
     */
    // public function create(Content $content)
    // {
    //     return $content
    //         ->header(' Create ')
    //         ->description(' Customer ')
    //         ->body($this->form())
    //         ->breadcrumb(
    //             ['text' => 'New Request Customer', 'url' => '/new_request/customer'],
    //             ['text' => 'Create']
    //         );
    // }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    // public function edit()
    // {
    //     return redirect('404');
    // }

    /**
     * Show interface.
     *
     * @param $id
     * @return Content
     */
    protected function detail($id)
    {
        $show = new Show(MasterCompany::findOrFail($id));

        $show->id('ID');
        $show->full_name('Full Name');
        $show->api_secret_key('Api Secret Key');

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
        // Session::put('lookup_name', 'pgsql');

        $grid = new Grid(new MasterCompany());

        $grid->column('id', 'ID')->sortable();
        $grid->column('full_name', 'Nama');

        // $grid->column('roles', trans('admin.roles'))->pluck('name')->label();
        // $grid->unit()->lookup_name(trans('admin.unit'))->label();

        $grid->column('isholding', 'Is Holding');
        $grid->column('brand_name', 'Brand Name');
        $grid->column('api_secret_key', 'API Secret Key');

        // Display data only based on user
        // $grid->model()->where([['flag_process', '=', '3']]);

        $grid->expandFilter();
        $grid->disableExport();
        $grid->disableCreateButton();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->column(1 / 2, function ($filter) {
                $filter->ilike('full_name', __('Full Name'));
                $filter->ilike('brand_name', __('Brand Name'));
            });
        });

        // Hot Keys (['r' => 'Refresh page', 'c' => 'Go to the creation page', 'f' => 'Expand or hide the filter'])
        // $grid->enableHotKeys();

        $grid->actions(function ($actions) {
            $actions->disableView();
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

        /*$clientInfoTable = 'mdm_mst_company';
        $connection = config('admin.database.connection');*/

        $form->display('id', 'ID');
        $form->text('full_name', 'Full Name')->rules('required')->readonly();
            // ->creationRules(['required', "unique:{$connection}.{$clientInfoTable}"]);

        $form->text('api_secret_key', 'API Secret Key')->default(Str::random(60))->rules('required')->readonly();

        $form->disableEditingCheck();
        $form->disableCreatingCheck();
        $form->disableViewCheck();

        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });
    
        $form->saving(function (Form $form) {
            // $form->api_token = bcrypt($form->api_token);
            // return redirect('/sys_admin/api/acces_config');
        });

        return $form;
    }

    public function destroy($id)
    {
        $response = [
            'status'  => false,
            'message' => trans('admin.delete_failed'),
        ];

        return response()->json($response);
        // return $this->form()->destroy($id);
    }
}
