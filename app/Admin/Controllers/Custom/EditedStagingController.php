<?php

namespace App\Admin\Controllers\Custom;

use App\Traits\CustomTraits;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class EditedStagingController extends Controller
{
    use CustomTraits;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return redirect('404');
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(' Edited ');
            $content->description(' Staging ');
            $content->body($this->formStaging()->edit($id));
            $content->breadcrumb(
                ['text' => 'Edited Staging']
            );
        });
    }

    /**
     * Show the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect('404');
    }

    /**
     * Form interface.
     *
     * @return Content
     */
    public function formStaging()
    {
        // Insert data based on staging unit database
        // Session::put('lookup_name', Session::get('user')->lookup_name);

        // Get form insert
        $unit = $this->LoadFormGR('edit_staging');

        return $unit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $this->formStaging()->update($id);
    }
}
