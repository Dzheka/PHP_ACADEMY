<?php

namespace Core\Security;

class Validator
{
    public static string $value;
    public static string $validate;

    public static function validate(string $value, string $validate, bool $clean)
    {
        self::$value = ($clean) ? self::clean($value) : $value;
        self::$validate = ($clean) ? self::clean($validate) : $validate;

        if (!filter_var(self::$value, self::$validate))
        {
            return "Incorrect value!";
        }

        return self::$value;
    }

    private static function clean($value)
    {
        return preg_replace('/[^\w\d\s]+/', '', htmlspecialchars($value));
    }
}