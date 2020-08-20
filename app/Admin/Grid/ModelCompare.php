<?php

namespace App\Admin\Grid;

use Encore\Admin\Grid\Model as BaseModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use App\Admin\GridCompare;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Builder;

class ModelCompare extends BaseModel
{
    protected $emptyRows;

    public function __construct(EloquentModel $model, GridCompare $grid = null)
    {
        parent::__construct($model, $grid);
    }

    /*protected function setGoldenRecordCriteria()
    {
        $this->queries->push([
            'method'    => 'whereHas',
            'arguments' => [
                'mappingGolden',
                function ( Builder $query ) {
                    $query->select('golden');
                    $query->where('golden', '=', 'Y');
                }
            ],
        ]);
    }*/

    protected function get()
    {
        if ($this->relation) {
            $this->model = $this->relation->getQuery();
        }

        $dataContents = [];
        $goldenRecord = $this->model;
        $businessUnits = $goldenRecord->businessUnits()->get();

        $goldenRecord->unit = strtoupper('Golden Record');
        $dataContents[] = $goldenRecord;

        foreach ($businessUnits as $row) {
            $businessUnitProfileInstance = Helper::businessUnitInstanceByUnit($row->unit);
            $businessUnitProfile = $businessUnitProfileInstance->findOrFail($row->u_id);
            $dataContents[] = $businessUnitProfile;
        }

        return collect($dataContents);

        throw new \Exception('Grid query error');
    }

    public function buildData($toArray = true)
    {
        if (empty($this->data)) {
            $collection = $this->get();
            // dd($collection);

            if ($this->collectionCallback) {
                $collection = call_user_func($this->collectionCallback, $collection);
            }

            if ($toArray) {
                $this->data = $collection->toArray();
            } else {
                $this->data = $collection;
            }
        }

        return $this->data;
    }
}