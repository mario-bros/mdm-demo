<?php
namespace App\Admin\Grid;

use Encore\Admin\Grid\Filter as BaseFilter;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

class Filter extends BaseFilter
{
    protected function fullUrlWithoutQuery($keys)
    {
        if ($keys instanceof Arrayable) {
            $keys = $keys->toArray();
        }

        $keys = (array) $keys;

        $request = request();

        $query = $request->query();
        unset($query['cursor']);
        Arr::forget($query, $keys);

        $question = $request->getBaseUrl().$request->getPathInfo() == '/' ? '/?' : '?';

        return count($request->query()) > 0
            ? $request->url().$question.http_build_query($query)
            : $request->fullUrl();
    }
}
