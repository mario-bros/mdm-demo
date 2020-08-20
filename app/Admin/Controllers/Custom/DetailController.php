<?php

namespace App\Admin\Controllers\Custom;

use App\Traits\CustomTraits;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DetailController extends Controller
{
    use CustomTraits;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(' Detail ');
            $content->description('Data Customer');
            $content->body($this->getShowFromGlobalReport($id));
        });
    }

    public function certified($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(' Detail ');
            $content->description('Data Customer');
            $content->body($this->getShowCertfied($id));
        });
    }

    protected function getShowCertfied($id)
    {
        $goldenRecords = $this->LoadDetailGoldenRecord($id, 'detail');

        return $goldenRecords;
    }

    protected function getShowFromGlobalReport($id)
    {
        // $goldenRecords = $this->LoadDetailGoldenRecord($id, 'detail');
        $goldenRecords = $this->LoadDetail($id, 'detail');

        return $goldenRecords;
    }
}
