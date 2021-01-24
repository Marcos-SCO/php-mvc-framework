<?php

namespace App\Core;

abstract class Model
{
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                // assign received values to corresponding properties 
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
    }
}
