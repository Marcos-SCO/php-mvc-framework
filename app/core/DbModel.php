<?php

namespace App\Core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName;
        $attributes = $this->attributes;
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $stmt = self::prepare('INSERT INTO' . $tableName . ' (' . implode(',', $attributes) . ') VALUES (' . implode(',', $params) . ')');
        var_dump($stmt, $params, $attributes);
    }

    public static function prepare($sql)
    {
        Application::$app->db->pdo->prepare($sql);
    }
}
