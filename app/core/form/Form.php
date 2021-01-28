<?php

namespace App\Core\Form;

use App\Core\Model;

class Form
{
    public static function begin($action, $method, $class = '')
    {
        echo sprintf(
            '<form action="%s" method="%s" class="%s">',
            $action,
            $method,
            $class
        );

        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }
}
