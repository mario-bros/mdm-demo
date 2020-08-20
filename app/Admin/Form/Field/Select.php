<?php

namespace App\Admin\Form\Field;

use Encore\Admin\Form\Field\Select as BaseSelect;

class Select extends BaseSelect
{
    public function setPlaceholder($placeholderText = '') 
    {
        $this->placeholder = $placeholderText;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $configs = array_merge([
            'allowClear'  => true,
            'placeholder' => [
                'id'   => '',
                'text' => $this->placeholder,
            ],
        ], $this->config);

        $configs = json_encode($configs);

        if (empty($this->script)) {
            $this->script = "$(\"{$this->getElementClassSelector()}\").select2($configs);";
        }

        if ($this->options instanceof \Closure) {
            if ($this->form) {
                $this->options = $this->options->bindTo($this->form->model());
            }

            $this->options(call_user_func($this->options, $this->value, $this));
        }

        $this->options = array_filter($this->options, 'strlen');

        $this->addVariables([
            'options' => $this->options,
            'groups'  => $this->groups,
        ]);

        $this->addCascadeScript();

        $this->attribute('data-value', implode(',', (array) $this->value()));

        return parent::render();
    }
}
