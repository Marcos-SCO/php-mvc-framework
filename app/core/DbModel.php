<?php

namespace App\Core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $stmt = self::prepare('INSERT INTO ' . $tableName . ' (' . implode(',', $attributes) . ') VALUES (' . implode(',', $params) . ')');

        foreach ($attributes as $attribute) {
            // $stmt->bindValue("{:$attribute}", $this->{$attribute});
            self::bind($stmt, "{:$attribute}", $this->{$attribute});
        }
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    public static function bind($stmt, $param, $value, $type = null)
    {
        if (is_null($type)) {
            switch ($value) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }
        return $stmt->bindValue($param, $value, $type);
    }
}
