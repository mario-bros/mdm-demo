<?php

namespace App\Admin\Grid;

use Encore\Admin\Grid\Model as BaseModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use App\Admin\GridCursorBasedPagination;

class Model extends BaseModel
{
    protected $emptyRows;

    public function __construct(EloquentModel $model, GridCursorBasedPagination $grid = null, bool $emptyRows = false)
    {
        $this->emptyRows = $emptyRows;
        parent::__construct($model, $grid);
    }

    protected function get()
    {
        if ($this->relation) {
            $this->model = $this->relation->getQuery();
        }

        $this->setSelectedColumns();
        $this->setSort();
        $this->setPaginate();

        $this->queries->unique()->each(function ($query) {
            $this->model = call_user_func_array([$this->model, $query['method']], $query['arguments']);
        });

        return $this->model->items();

        throw new \Exception('Grid query error');
    }

    protected function setPaginate()
    {
        $paginate = $this->findQueryByMethod('cursorPaginate');

        $this->queries = $this->queries->reject(function ($query) {
            return $query['method'] == 'cursorPaginate';
        });

        if ( ! $this->usePaginate ) {
            $query = [
                'method'    => 'get',
                'arguments' => [],
            ];
        } else {
            $query = [
                'method'    => 'cursorPaginate',
                'arguments' => $this->resolveArgs($paginate),
            ];
        }

        $this->queries->push($query);
    }

    protected function setSelectedColumns()
    {
        $tableColumns = $this->model->getTableColumns();
        $selectedColumns = [];
        foreach ($this->grid->getAllColumns() as $columnObj) {
            if ( in_array($columnObj->getName(), $tableColumns) ) 
                $selectedColumns[] = $columnObj->getName();
        }
        $selectedColumns[] = 'id';
        $selectedColumns[] = 'u_id';
        
        $this->queries->push([
            'method'    => 'select',
            'arguments' => $selectedColumns,
        ]);
    }

    protected function resolveArgs($paginate)
    {
        if ($perPage = request($this->perPageName)) {
            if (is_array($paginate)) {
                $paginate['arguments'][0] = (int) $perPage;

                return $paginate['arguments'];
            }

            $this->perPage = (int) $perPage;
        }

        if (isset($paginate['arguments'][0])) {
            return $paginate['arguments'];
        }

        if ($name = $this->grid->getName()) {
            return [$this->perPage, ['*'], "{$name}_page"];
        }

        $arguments = [];
        $arguments[] = $this->perPage;
        $arguments[] = [];
        $arguments[] = $this->emptyRows;
        return $arguments;
    }
}
