<?php

namespace App\Helpers;

use \Illuminate\Pagination\Paginator as BasePaginator;


class CursorPaginatorCopy extends BasePaginator
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

    public function appends($key, $value = null)
    {
        if (is_null($key)) {
            return $this;
        }

        if (is_array($key)) {
            $this->params = $key;
            // dd($this->params);
            // dd( $this->hasPages() );
            return $this->appendArray($key);
        }

        return $this->addQuery($key, $value);
    }

    /*public function appends($params)
    {
        $this->params = $params;

        return $this;
    }*/

    public function items()
    {
        // dd( $this->items->last() );

        // dd( $this->items->last()->id );
        // dd( $this->items->first()->id );

        // dd( $this->fragment );
        // dd( $this->query );
        // dd( $this->pageName );
        // dd( $this->path );
        // $currentPath = implode( "/", request()->segments() );
        // $prevURL = '/' . $currentPath . $this->url( $this->items->first()->id );
        // dd($prevURL);
        // dd( $this->url($this->currentPage() - 1) );
        // dd( $this->currentPage );
        // dd( $this->onFirstPage() );

        // dd($this->hasMorePages());
        // dd($this->items->count());
        // dd($this->hasMore);
        // dd( $this->perPage );

        return $this->items;
        // return $this->items->all();
    }

    public function previousPageUrl()
    {
        $currentCursor = self::currentCursor();
        $prevFirstLastIDHash = $currentCursor->prev_page;
        $prevCursor = [
            'cursor' => base64_encode(json_encode( ['first_id' => $prevFirstLastIDHash['first_id'], 'last_id' => $prevFirstLastIDHash['last_id'], 'page' => $this->setCurrentPage( $this->currentPage - 1 ), 'direction' => 'desc'] )),
            // 'cursor' => base64_encode(json_encode( ['id' => $this->items->last()->id, 'first_id' => $firstIDofPrevPage, 'page' => $this->setCurrentPage( $this->currentPage - 1 ), 'direction' => 'desc'] )),
        ];

        return $this->nextCursor ? url()->current() . '?' . http_build_query($prevCursor + $this->params) : null;

        /*$currentPath = implode( "/", request()->segments() );
        $prevURL = '/' . $currentPath . $this->url( $this->items->first()->id );
        if ($this->currentPage() > 1) {
            return $prevURL;
        }*/
    }

    public function nextCursorUrl()
    {
        // $nextPage = $this->currentPage + 1;
        $currentFirstLastIDHash = [
            'first_id' => $this->items->first()->id,
            'last_id' => $this->items->last()->id,
        ];
        $nextCursor = [
            'cursor' => base64_encode(json_encode( [ 'id' => $this->items->last()->id, 'prev_page' => $currentFirstLastIDHash, 'page' => $this->setCurrentPage( $this->currentPage + 1 ), 'direction' => 'asc'] )),
        ];

        return $this->nextCursor ? url()->current() . '?' . http_build_query($nextCursor + $this->params) : null;
    }
}
