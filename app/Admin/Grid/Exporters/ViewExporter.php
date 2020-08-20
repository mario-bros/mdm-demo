<?php

namespace App\Admin\Grid\Exporters;

use Encore\Admin\Grid\Exporters\AbstractExporter;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

abstract class ViewExporter extends AbstractExporter implements FromView
{

    public function view(): View
    {
        return view('vendor.admin.exports.customer', [
            // 'invoices' => Invoice::all()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function export()
    {
        $this->download($this->fileName)->prepare(request())->send();

        exit;
    }
}
