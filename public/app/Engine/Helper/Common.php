<?php

namespace App\Engine\Helper;

class Common
{
    function isPost()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            return true;
        }
        return false;
    }

    public static function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public static function getPathUrl()
    {
        $pathUrl = $_SERVER["REQUEST_URI"];

        if ($position = strpos($pathUrl, "?")) {
            $pathUrl = substr($pathUrl, 0, $position);
        }
        return $pathUrl;
    }
}