<?php
namespace App\Admin;

use Illuminate\Database\Eloquent\Model as Eloquent;

use Closure;

use Encore\Admin\Admin;
use Encore\Admin\Grid as BaseGrid;
use Encore\Admin\Grid\Column;
use Encore\Admin\Exception\Handler;

use App\Admin\Grid\ModelCompare as Model;
use App\Admin\Grid\Tools\FixColumnsCompare as FixColumns;

class GridCompare extends BaseGrid
{
    protected static $js = '/vendor/transpose_table/transpose_table.js';

    public function __construct(Eloquent $model, Closure $builder = null)
    {
        $this->model = new Model($model, $this);
        $this->keyName = $model->getKeyName();
        $this->builder = $builder;

        $this->initialize();

        $this->callInitCallbacks();

        $this->view = 'admin::grid.transposed-table';
        $this->addHeaderScript(static::$js);
    }

    protected function addHeaderScript($script)
    {
        Admin::headerJs($script);
    }

    public function render()
    {
        try {
            $this->build();
        } catch (\Exception $e) {
            return Handler::renderException($e);
        }

        $this->callRenderingCallback();

        return view($this->view, $this->variables())->render();
    }

    public function build()
    {
        if ($this->builded) {
            return;
        }

        $collection = $this->applyFilter(false);

        $this->addDefaultColumns();
        // dd($this->columns);

        Column::setOriginalGridModels($collection);

        $data = $collection->toArray();
        // dd($data);

        $this->columns->map(function (Column $column) use (&$data) {
            $data = $column->fill($data);

            $this->columnNames[] = $column->getName();
        });

        $this->buildRows($data);

        $this->builded = true;
    }

    public function fixColumns(int $head, int $tail = -1)
    {
        $this->fixColumns = new FixColumns($this, $head, $tail);

        $this->rendering($this->fixColumns->apply());
    }
}
