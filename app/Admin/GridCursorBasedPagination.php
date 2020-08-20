<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model as Eloquent;

use Closure;

use Encore\Admin\Grid as BaseGrid;
use Encore\Admin\Grid\Exporter;
use Encore\Admin\Grid\Column;

use App\Admin\Grid\Model;
use App\Admin\Grid\Filter;
use App\Admin\Grid\Tools;

use App\Admin\Grid\Tools\Paginator;
use App\Admin\Grid\Tools\ExportButton;

use App\Admin\Grid\Displayers\RowSelector;


class GridCursorBasedPagination extends BaseGrid
{
    public function __construct(bool $emptyRows = false, Eloquent $model, Closure $builder = null)
    {
        $this->model = new Model($model, $this, $emptyRows);
        $this->keyName = $model->getKeyName();
        $this->builder = $builder;

        $this->initialize();

        $this->handleExportRequest();

        $this->callInitCallbacks();
    }

    protected function prependRowSelectorColumn()
    {
        if (!$this->option('show_row_selector')) {
            return;
        }

        $checkAllBox = "<input type=\"checkbox\" class=\"{$this->getSelectAllName()}\" />&nbsp;";

        $this->prependColumn(Column::SELECT_COLUMN_NAME, ' ')
            ->displayUsing(RowSelector::class)
            ->addHeader($checkAllBox);
    }

    protected function initTools()
    {
        $this->tools = new Tools($this);

        return $this;
    }

    protected function initFilter()
    {
        $this->filter = new Filter($this->model());

        return $this;
    }

    public function paginator()
    {
        return new Paginator($this);
    }

    public function getAllColumns()
    {
        return $this->columns;
    }

    public function renderExportButton()
    {
        return (new ExportButton($this))->render();
    }

    public function getExportUrl($scope = 1, $args = null)
    {
        $URLParams = request()->all();
        $URLParams['customer_id'] =( ! empty($URLParams['customer_id'])) ? $URLParams['customer_id'] : '';
        $URLParams['dob']['start'] =( ! empty($URLParams['dob']['start'])) ? $URLParams['dob']['start'] : '';
        $URLParams['dob']['end'] =( ! empty($URLParams['dob']['end'])) ? $URLParams['dob']['end'] : '';
        $URLParams['kota_id'] =( ! empty($URLParams['kota_id'])) ? $URLParams['kota_id'] : '';
        $URLParams['full_name'] =( ! empty($URLParams['full_name'])) ? $URLParams['full_name'] : '';
        $URLParams['email1'] =( ! empty($URLParams['email1'])) ? $URLParams['email1'] : '';
        $URLParams['unit'] =( ! empty($URLParams['unit'])) ? $URLParams['unit'] : '';

        $input = array_merge($URLParams, Exporter::formatExportQuery($scope, $args));

        if ($constraints = $this->model()->getConstraints()) {
            $input = array_merge($input, $constraints);
        }

        return $this->resource().'?'.http_build_query($input);
    }
}
