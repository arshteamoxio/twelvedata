<?php

namespace TwelveData\Base;

abstract class BaseClass
{

    public static function getClass()
    {
        return get_called_class();
    }

    public static function getNamespace()
    {
        return __NAMESPACE__;
    }

    public static function getRootNamespace()
    {
        $nameSpace = self::getNamespace();
        $nameSpace = explode('\\', $nameSpace);
        return $nameSpace[0];
    }

}
