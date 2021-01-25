<?php

namespace App\Core\Form;

use App\Core\Model;

class Field
{
    public Model $model;
    public string $attribute;
    public string $type;

    public function __construct(Model $model, string $attribute, string $type)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = $type;
    }

    public function __toString()
    {
        return sprintf(
            '
            <div class="mb-3">
                <label for="%s" class="form-label">%s</label>
                <input type="%s" name="%s" id="%s" aria-describedby="%s" value="%s" class="form-control%s">
                <div class="invalid-feedback">%s</div>
            </div>
        ',
            $this->attribute,
            ucfirst(str_replace('_', ' ', $this->attribute)),
            $this->type,
            $this->attribute,
            $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid ' : '',
            $this->model->getFirstError($this->attribute),
        );
    }
}
