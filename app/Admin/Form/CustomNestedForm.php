<?php

namespace App\Admin\Form;

use Encore\Admin\Form\NestedForm as BaseNestedForm;
use App\Admin\Form;
use Illuminate\Support\Arr;

class CustomNestedForm extends BaseNestedForm
{
    public function __call($method, $arguments)
    {
        if ($className = Form::findFieldClass($method)) {
            $column = Arr::get($arguments, 0, '');

            /* @var Field $field */
            $field = new $className($column, array_slice($arguments, 1));

            $field->setForm($this->form);

            $field = $this->formatField($field);

            $this->pushField($field);

            return $field;
        }

        return $this;
    }
}
