<?php

namespace App\Admin\Controllers\Extensions;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Illuminate\Http\Request;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Model\Extensions\MDMConfig;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;

class EmailConfigController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header(trans('admin.config_control'));
            $content->description(' ');
            $body = $this->grid();
            $content->row(function (Row $row) use ($content, $body) {
                $row->column(1 / 2, $body);
                $row->column(1 / 2, new Box(trans('admin.email_action.config_smtp'), $this->viewSMTPConfig()));
            });
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MDMConfig);
        $grid->detail(trans('admin.email_action.manager'))->display(function ($detail) {
            return trans(htmlentities($detail));
        });
        $states = [
            '1' => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
            '0' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
        ];
        $grid->value(trans('admin.email_action.mode'))->switch($states);
        $grid->model()->where('code', 'email_action')->orderBy('sort', 'asc');
        $grid->disableCreation();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableFilter();
        $grid->disableActions();
        $grid->disableTools();
        $grid->disablePagination();
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(MDMConfig::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('code', 'Code');
            $form->text('key', 'Key');
            $form->number('sort', 'Sort');
            $states = [
                '1' => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
                '0' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
            ];
            $form->switch('value', 'Value')->states($states);
            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->tools(function (Form\Tools $tools) {
                $tools->disableView();
            });
        });
    }

    public function viewSMTPConfig()
    {
        $configs = MDMConfig::where('code', 'smtp')->orderBy('sort', 'desc')->get();
        if ($configs === null) {
            return trans('no_data');
        }
        $fields = [];
        foreach ($configs as $key => $field) {
            $data['title']    = $field->detail;
            $data['field']    = $field->key;
            $data['key']      = $field->key;
            $data['value']    = $field->value;
            $data['disabled'] = 0;
            $data['required'] = 0;
            $data['type']     = 'text';
            $data['source']   = '';
            if ($field->key == 'smtp_mode') {
                $data['type']   = 'select';
                $data['source'] = json_encode(
                    array(
                        ['value' => '0', 'text' => 'Not use'],
                        ['value' => '1', 'text' => 'SMTP'],
                    )
                );
            } elseif ($field->key == 'smtp_port') {
                $data['type'] = 'text';
            } elseif ($field->key == 'smtp_security') {
                $data['type']   = 'select';
                $data['source'] = json_encode(
                    array(
                        ['value' => 'tls', 'text' => 'TLS'],
                        ['value' => 'ssl', 'text' => 'SSL'],
                    )
                );
            }
            $data['url'] = route('updateConfigField');
            $fields[]    = $data;
        }
        return view('admin.CustomEdit')->with([
            "datas" => $fields,
        ])->render();
    }

    public function updateConfigField(Request $request)
    {
        $data  = $request->all();
        $key   = $data['pk'];
        // $field = $data['name'];
        $value = $data['value'];
        MDMConfig::where('key', $key)->update(['value' => $value]);
    }

}
