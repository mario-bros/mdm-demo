<?php

namespace App\Admin\Grid\Tools;

use Encore\Admin\Grid\Tools\Paginator as BasePaginator;
use App\Admin\GridCursorBasedPagination;

class Paginator extends BasePaginator
{
    public function __construct(GridCursorBasedPagination $grid)
    {
        $this->grid = $grid;
        $this->initPaginator();
    }

    protected function initPaginator()
    {
        // dd( $this->grid->model() );
        // print_r( get_class( $this->grid->model() ) ); exit(' bye ');
        // dd( request()->all() );

        $this->paginator = $this->grid->model()->eloquent();
        // $this->paginator = new FrameworkPaginator();
        // print_r( get_class( $this->paginator ) ); exit(' bye ');
        // dd($this->paginator->items());
        // dd(request()->all());

        $this->paginator->appends(request()->all());
    }

    protected function paginationLinks()
    {
        return $this->paginator->render('admin::pagination-cursor-based');
    }

    public function render()
    {
        if (!$this->grid->showPagination()) {
            return '';
        }

        return $this->paginationLinks().
            $this->perPageSelector();
    }
}
