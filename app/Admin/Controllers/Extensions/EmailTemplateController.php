<?php

namespace App\Admin\Controllers\Extensions;

use Encore\Admin\Grid;
use Encore\Admin\Form;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use App\Model\Extensions\MDMEmailTemplate;
use Encore\Admin\Controllers\HasResourceActions;

class EmailTemplateController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public $arrayGroup = [];

    public function __construct()
    {
        $this->arrayGroup = [
            'email_proposed'                 => trans('admin.email_action.email_proposed'),
            'email_approved'                 => trans('admin.email_action.email_approved'),
            'email_certified'                => trans('admin.email_action.email_certified'),
            'email_rejected'                 => trans('admin.email_action.email_rejected'),
            'email_compare'                  => trans('admin.email_action.email_compare'),
            'email_order_success_customer'   => trans('admin.email_action.email_order_success_customer'),
        ];
    }
    public function index(Content $content)
    {
        return $content
            ->header(' Template ')
            ->description(' ')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $arrayGroup = $this->arrayGroup;
        $grid = new Grid(new MDMEmailTemplate);

        $grid->id('ID');
        $grid->name('Name');
        $grid->group('Group')->display(function ($group) use ($arrayGroup) {
            return $arrayGroup[$group];
        });
        $grid->status('Status')->switch();

        $grid->disableFilter();
        $grid->disableCreateButton();
        $grid->disableExport();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(MDMEmailTemplate::findOrFail($id));

        $show->id('ID');
        $show->name('Name');
        $show->group('Group');
        $show->status('Status');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MDMEmailTemplate);

        $form->text('name', 'Name');
        $form->select('group', 'Group')->options($this->arrayGroup);
        $form->textarea('text', 'Text')->rows(20);
        $form->switch('status', 'Status');

        return $form;
    }
}
