<?php

namespace App\Admin\Form\Field;

use Encore\Admin\Form\Field\HasMany as BaseHasMany;
use Illuminate\Database\Eloquent\Relations\HasMany as Relation;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Arr;
use Encore\Admin\Form\NestedForm;
use App\Admin\Form\CustomNestedForm;

/**
 * Class HasMany.
 */
class HasMany extends BaseHasMany
{

    /**
     * Build Nested form for related data.
     *
     * @throws \Exception
     *
     * @return array
     */
    protected function buildRelatedForms()
    {
        if (is_null($this->form)) {
            return [];
        }

        $model = $this->form->model();

        $relation = call_user_func([$model, $this->relationName]);

        if (!$relation instanceof Relation && !$relation instanceof MorphMany) {
            throw new \Exception('hasMany field must be a HasMany or MorphMany relation.');
        }

        $forms = [];

        /*
         * If redirect from `exception` or `validation error` page.
         *
         * Then get form data from session flash.
         *
         * Else get data from database.
         */
        if ($values = old($this->column)) {
            foreach ($values as $key => $data) {
                if ($data[NestedForm::REMOVE_FLAG_NAME] == 1) {
                    continue;
                }

                $model = $relation->getRelated()->replicate()->forceFill($data);

                $forms[$key] = $this->buildNestedForm($this->column, $this->builder, $model)
                    ->fill($data);
            }
        } else {
            if (empty($this->value)) {
                return [];
            }
            $uniqueValues = array_map("unserialize", array_unique(array_map("serialize", $this->value)));

            foreach ($uniqueValues as $idx => $data) {
                // dd($idx);
                $key = Arr::get($data, $relation->getRelated()->getKeyName());
                // dd($data);
                // dd($relation->getRelated()->getKeyName());

                $model = $relation->getRelated()->replicate()->forceFill($data);
                // $model = $relation->getRelated()->forceFill($data);
                // dd($model);

                $forms[$idx] = $this->buildNestedForm($this->column, $this->builder, $model)
                    ->fill($data);
            }
        }

        return $forms;
    }

    protected function buildNestedForm($column, \Closure $builder, $model = null)
    {
        $form = new CustomNestedForm($column, $model);

        $form->setForm($this->form);

        call_user_func($builder, $form);

        $form->hidden($this->getKeyName());

        $form->hidden(NestedForm::REMOVE_FLAG_NAME)->default(0)->addElementClass(NestedForm::REMOVE_FLAG_CLASS);

        return $form;
    }
}
