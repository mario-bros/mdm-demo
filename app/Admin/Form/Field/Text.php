<?php

namespace App\Admin\Form\Field;

use Encore\Admin\Form\Field\Text as BaseText;

class Text extends BaseText
{
    protected function initPlainInput()
    {
        if (empty($this->view)) {
            $this->view = 'admin::form.input-compare';
        }
    }
}
