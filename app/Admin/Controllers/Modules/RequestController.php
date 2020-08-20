<?php

namespace App\Admin\Controllers\Modules;

use Encore\Admin\Grid;
use App\Traits\CustomTraits;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Admin\Actions\Post\Detail;
use App\Admin\Actions\Post\Compare;
use App\Admin\Actions\Post\Approved;
use App\Admin\Actions\Post\Proposed;
use App\Admin\Actions\Post\Rejected;
use App\Http\Controllers\Controller;
use App\Admin\Actions\Post\Certified;
use App\Admin\Actions\Post\EditedStaging;

// use App\Model\Profile;
use App\Model\GlobalReports\Profile as GlobalReportProfile;

class RequestController extends Controller
{
    use CustomTraits;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index($key, Content $content)
    {
        if(($key == 'notification' || $key == 'checked' || $key == 'rejected' || $key == 'wishlist')){
            return $content
                ->header(' Customer ')
                ->description(' Request ')
                ->body($this->{$key}())
                ->breadcrumb(
                    ['text' => 'Customer Request']
                );
        } else{
            return redirect('404');
        }
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function notification()
    {
        //Session::put('lookup_name', Session::get('user')->lookup_name);
        // Session::put('lookup_name', 'report');

        $grid = $this->LoadGrid();
        // dd( $grid );

        // Display data only based on roles user
        if (\Admin::user()->isRole('checker')) {
            $grid->model()->where('flag_process', '=', '0');
            $grid->model()->where('flag_process', '!=', '3');
        }

        if (\Admin::user()->isRole('approval')) {
            $grid->model()->where('flag_process', '=', '1');
            $grid->model()->where('flag_process', '!=', '3');
        }

        if (\Admin::user()->isRole('certify')) {
            $grid->model()->where('flag_process', '=', '2');
            $grid->model()->where('flag_process', '!=', '3');
            // $grid->model()->where('flag_process', '=', '3');
        }

        if (\Admin::user()->isRole('moderator')) {
            $grid->model()->where('flag_process', '>=', '0');
            $grid->model()->where('flag_process', '!=', '3');
        }

        // dd(  \Admin::user()->unit->lookup_name );
        // dd(  \Admin::user()->unit->id );

        // Custom action for mdo
        $grid->actions(function ($actions) {
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
            $actions->add(new Detail);
            /*if ($actions->flag_proccess == 3) {
                $actions->add(new Detail);
            }*/

            if($actions->row->flag_process != 3 && $actions->row->flag_process != -1){
                $actions->add(new Rejected);
            }

            if ( \Admin::user()->inRoles(['administrator', 'moderator', 'checker']) AND $actions->row->flag_process == 0) {
                $actions->add(new Proposed);
            }

            if ( \Admin::user()->inRoles(['administrator', 'moderator', 'approval']) AND $actions->row->flag_process == 1) {
                $actions->add(new Approved);
            }

            if ( \Admin::user()->inRoles(['administrator', 'moderator', 'certify']) AND $actions->row->flag_process == 2) {
                $actions->add(new Certified);
            }

            if ( \Admin::user()->inRoles(['moderator', 'checker', 'approval', 'certify', 'administrator']) AND GlobalReportProfile::where('email', $actions->row->email)->count() != 0) {
            // if (\Admin::user()->inRoles(['moderator', 'checker', 'approval', 'certify', 'administrator']) ) {
                $actions->add(new Compare);
            }

            $actions->add(new EditedStaging);
        });

        // Filter data
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->expandFilter();

        $grid->filter(function ($filter) {
            $this->LoadFilter($filter);
        });

        return $grid;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function checked()
    {
        //Session::put('lookup_name', Session::get('user')->lookup_name);
        // Session::put('lookup_name', 'report');

        $grid = $this->LoadGrid();

        // Display data only based on roles user
        if (\Admin::user()->inRoles(['checker', 'administrator'])) {
            $grid->model()->where('flag_process', '=', '1');
            $grid->model()->where('updated_by', '=', Admin::user()->id);
        }

        if (\Admin::user()->inRoles(['approval', 'administrator'])) {
            $grid->model()->where('flag_process', '=', '2');
            $grid->model()->where('updated_by', '=', Admin::user()->id);
        }

        if (\Admin::user()->inRoles(['certify', 'administrator'])) {
            $grid->model()->where('flag_process', '=', '3');
            $grid->model()->where('updated_by', '=', Admin::user()->id);
        }

        if (\Admin::user()->isRole('moderator')) {
            $grid->model()->where('flag_process', '>=', '0');
            $grid->model()->where('updated_by', '=', Admin::user()->id);
        }

        // Custom action for mdo
        $grid->actions(function ($actions) {
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
            $actions->add(new Detail);

            if($actions->row->flag_process != 3 && $actions->row->flag_process != -1){
                $actions->add(new Rejected);
            }
        });

        // Filter data
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->expandFilter();

        $grid->filter(function ($filter) {
            $this->LoadFilter($filter);
        });

        return $grid;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function rejected()
    {
        //Session::put('lookup_name', Session::get('user')->lookup_name);
        // Session::put('lookup_name', 'report');

        $grid = $this->LoadGrid();

        $grid->model()->where('flag_process', '=', '-1');

        // Custom action for mdo
        $grid->actions(function ($actions) {
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
            $actions->add(new Detail);
        });

        // Filter data
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->expandFilter();

        $grid->filter(function ($filter) {
            $this->LoadFilter($filter);
        });

        return $grid;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function wishlist()
    {
        //Session::put('lookup_name', Session::get('user')->lookup_name);
        // Session::put('lookup_name', 'report');
        
        $grid = $this->LoadGrid();

        // Display data only based on roles user
        if (\Admin::user()->inRoles(['checker', 'administrator'])) {
            $grid->model()->where('created_by', '=', Admin::user()->id);
        }

        if (\Admin::user()->inRoles(['approval', 'administrator'])) {
            $grid->model()->where('created_by', '=', Admin::user()->id);
        }

        if (\Admin::user()->inRoles(['certify', 'administrator'])) {
            $grid->model()->where('created_by', '=', Admin::user()->id);
        }

        if (\Admin::user()->isRole('moderator')) {
            $grid->model()->where('created_by', '=', Admin::user()->id);
        }

        // Custom action for mdo
        $grid->actions(function ($actions) {
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();
            $actions->add(new Detail);
        });

        // Filter data
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->expandFilter();

        $grid->filter(function ($filter) {
            $this->LoadFilter($filter);
        });

        return $grid;
    }
}
