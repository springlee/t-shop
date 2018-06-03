<?php

namespace App\Services;


abstract class BaseService
{
    private static $_instance = null;

    private static function _instance()
    {
        if (!self::$_instance) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([self::_instance(), $name], $arguments);
    }
}
