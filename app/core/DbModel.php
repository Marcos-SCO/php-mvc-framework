<?php

namespace App\Core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    public function save()
    {
    }
}
