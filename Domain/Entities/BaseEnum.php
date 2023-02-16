<?php

namespace ValueObjects\Base;

abstract class BaseEnum
{
    protected static array $constCache = [];

    public static function getConstants()
    {
        if (empty(static::$constCache[get_called_class()])) {
            $reflect = new \ReflectionClass(get_called_class());
            static::$constCache[get_called_class()] = $reflect->getConstants();
        }
        return static::$constCache[get_called_class()];
    }

    public static function isValidName($name, $strict = false): bool
    {
        $constants = static::getConstants();
        if ($strict) {
            return array_key_exists($name, $constants);
        }
        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys, true);
    }

    public static function isValidValue($value): bool
    {
        $values = array_values(static::getConstants());
        return in_array($value, $values, true);
    }

    public static function getValue($name, $strict = false): string
    {
        $constants = static::getConstants();
        if ($strict && !array_key_exists($name, $constants)) {
            throw new \Exception('Такого значения не существует!');
        }
        $keys = array_map('strtolower', array_keys($constants));
        if(!in_array(strtolower($name), $keys, true)){
            throw new \Exception('Такого значения не существует!');
        }
        return $constants[strtolower($name)] ?? $constants[strtoupper($name)];
    }

    public static function getKey($value, $strict = false): string
    {
        $constants = static::getConstants();
        if ($strict && !in_array($value, $constants, true)) {
            throw new \Exception('Такого поля не существует! ' . ($value ?? 'пусто') . '. ' . print_r($constants, TRUE));
        }
        $values = array_map('strtolower', array_values($constants));
        if (!in_array(strtolower($value), array_map('strtolower', $values), true)) {
            throw new \Exception("Поля $value не существует! " . print_r($constants, TRUE));
        }
        $constants = array_flip($constants);

        return array_change_key_case($constants,  CASE_LOWER)[strtolower($value)];
    }
}
