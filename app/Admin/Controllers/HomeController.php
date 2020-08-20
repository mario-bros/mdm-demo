<?php

namespace App\Admin\Controllers;

use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\InfoBox;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {
            

            $content->header('Dashboard');
            $content->description('Master Data Management');

            $new = 0;
            $rejected = 0;
            $proposed = 0;
            $approved = 0;
            $certified = (int) collect( DB::select('select count(*) as golden_record_count from mdm_customer_profile_web') )->first()->golden_record_count;
            $formatedCertified = number_format($certified, 0, ',', '.');

            $content->row(function ($row) use ($proposed, $approved, $formatedCertified) {
                $row->column(4, new InfoBox(trans('admin.proposed'), 'user', 'yellow', route('customer.index'), $proposed ));
                $row->column(4, new InfoBox(trans('admin.approved'), 'tags', 'aqua', route('customer.index'), $approved ));
                $row->column(4, new InfoBox(trans('admin.certified'), 'shopping-cart', 'green', route('customer.index'), $formatedCertified ));
            });


            $content->body(view('admin.charts.bar', compact('new', 'rejected', 'proposed', 'approved', 'certified')));
        });
    }
}
