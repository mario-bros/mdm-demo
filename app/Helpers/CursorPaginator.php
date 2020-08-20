<?php

namespace App\Helpers;

use \Illuminate\Pagination\Paginator as BasePaginator;


class CursorPaginator extends BasePaginator
{
    protected $nextCursor;
    protected $params = [];

    public function __construct($items, $perPage, $currentPage, $options, $nextCursor = null)
    {
        $this->nextCursor = $nextCursor;
        parent::__construct($items, $perPage, $currentPage, $options);
    }

    public static function currentCursor()
    {
        return json_decode(base64_decode(request('cursor')));
    }

    /*public function appends($key, $value = null)
    {
        if (is_null($key)) {
            return $this;
        }

        if (is_array($key)) {
            $this->params = $key;
            return $this->appendArray($key);
        }

        return $this->addQuery($key, $value);
    }*/

    public function items()
    {
        // $this->params = request()->all();
        $this->params = $_GET;
        // dd($this->params);

        return $this->items;
    }

    public function previousPageUrl()
    {
        $prevCursor = [
            'cursor' => base64_encode(json_encode( ['id' => $this->items->first()->id, 'page' => $this->currentPage - 1, 'direction' => 'desc'] )),
        ];

        return url()->current() . '?' . http_build_query($prevCursor + $this->params);
    }

    public function nextCursorUrl()
    {
        $nextCursor = [
            'cursor' => base64_encode(json_encode( ['id' => $this->items->last()->id, 'page' => $this->currentPage + 1, 'direction' => 'asc'] )),
        ];

        return $this->nextCursor ? url()->current() . '?' . http_build_query($nextCursor + $this->params) : null;
    }
}
