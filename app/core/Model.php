<?php

namespace App\Core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors = [];

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                // assign received values to corresponding properties 
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
            }
        }
    }

    public function addError(string $attribute, string $rule)
    {
        $message = $this->errorMessages()[$rule] ?? '';
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'Esse campo é requirido',
            self::RULE_EMAIL => 'Esse campo deve ter um e-mail válido',
            self::RULE_MIN => 'Tamanho minimo do campo deve ser de {min}',
            self::RULE_MAX => 'Tamanho máximo do campo deve ser de {min}',
            self::RULE_MATCH => 'Esse campo deve ter o mesmo valor de {match}',
        ];
    }
}
