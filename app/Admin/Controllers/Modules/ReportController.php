<?php

namespace App\Admin\Controllers\Modules;

use App\Model\MasterCompany;
use App\Model\Profile;
use App\Model\GlobalReports\Profile as GlobalReportProfile;
use App\Model\BusinessUnits\Profile as BusinessUnitProfile;
use App\Admin\Grid;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Layout\Content;
use App\Admin\Actions\Post\Detail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index($key, Content $content)
    {
        return $content
            ->header(' Report ')
            ->description(' Customer ')
            ->body($this->{$key}());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function all()
    {   
        /*if (\Admin::user()->inRoles(['moderator', 'administrator'])) {
            $profileClass = new GlobalReportProfile();
        } else {
            $profileClass = new BusinessUnitProfile();
        }*/

        $profileClass = new GlobalReportProfile();

        $grid = new Grid($profileClass);

        $grid->column('email', __('Email'))->expand(function () {
            $file_array = array('First Name' => $this->first_name, 'Last Name' => $this->last_name, 'DOB' => $this->dob, 'Created At' => $this->created_at, 'Updated At' => $this->updated_at);
            $rows       = array_only($file_array, ['First Name', 'Last Name', 'DOB', 'Created At', 'Updated At']);
            return new Table([], $rows);
        })->sortable();

        $grid->column('full_name', __('Full Name'));

        $grid->genderID()->lookup_name(trans('admin.gender'));

        $grid->CategoryUser()->lookup_name(trans('admin.category_user_id'));

        $grid->column('flag_process', __('Certified Status'))
                ->replace([0 => 25, 1 => 50, 2 => 75, 3 => 100])
                ->progressBar('danger', 'sm', 100)
                ->help('25% = New Customer, 50% = Proposed, 75% = Approved, 100% = Certify');

        // $lookup = Lookups::where('category', 'Unit')->pluck('lookup_name', 'id')->toArray();
        // $grid->unit()->display(function($unitID) {
        //     foreach($unitID as $value){
        //         return $value['unit_id'];
        //     }
        //     if($unitID == null){
        //         return "<span class='label label-danger'>Unknown</span>";
        //     }
        // })->replace($lookup);

        // Display graph gender
        $grid->header(function ($query) use ($profileClass) {
            $counts = [
                'male' => $profileClass->where([['gender', '1']])->count(),
                'female' => $profileClass->where([['gender', '2']])->count(),
                'unknown' => $profileClass->where([['gender', '']])->count(),
            ];
            $doughnut = view('admin.charts.gender', compact('counts'));
            return new Box('Gender Ratio', $doughnut);
        });

        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->expandFilter();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->column(1 / 2, function ($filter) {
                $filter->like('email', __('Email'))->email();
                $filter->equal('flag_process', __('Status'))->select([
                    '0' => 'New Customer',
                    '1' => 'Proposed',
                    '2' => 'Approved',
                    '3' => 'Certified',
                    '-1' => 'Rejected'
                ]);
            });

            $filter->column(1 / 2, function ($filter) {
                $filter->where(function ($query) {
                    $unit = $this->input;
                    $query->whereHas('unit', function ($query) use ($unit) {
                        $query->where('unit_id', '=', $unit);
                    })->get();
                }, 'Unit')->select(MasterCompany::pluck('id', 'id'));
                $filter->between('created_at', __('Period'))->datetime();
            });
        });

        $grid->actions(function ($actions) {
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
            $actions->add(new Detail);
        });

        return $grid;
    }

    // SKIP THIS , WILL COME BACK LATER
    protected function customers() 
    {
        $grid = new Grid(new Profile);

        // dd( trans('admin.unit') );
        // dd( $grid->unit() );

        // $grid->column('id', 'ID')->sortable();
        $grid->column('u_id', 'ID');
        // $grid->column('unit', trans('admin.unit'));
        $grid->column('full_name', 'Nama Lengkap');
        $grid->column('gender', 'Jenis Kelamin');
        $grid->column('dob', 'Tgl Lahir');
        // $grid->column('roles', trans('admin.roles'))->pluck('name')->label();
        // $grid->unit()->lookup_name(trans('admin.unit'))->label();
        $grid->column('email1', trans('admin.email'));
        $grid->column('mobile_phone1', 'No. Handphone');
        $grid->column('original_email1', 'Orig Email');
        // $grid->column('created_at', trans('admin.created_at'));
        // $grid->column('updated_at', trans('admin.updated_at'));

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            if ($actions->getKey() == 1) {
                $actions->disableDelete();
            }
        });

        $grid->tools(function (Grid\Tools $tools) {
            $tools->batch(function (Grid\Tools\BatchActions $actions) {
                $actions->disableDelete();
            });
        });

        return $grid;
    }
}
