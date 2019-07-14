<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Core;

class Request
{
    public $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getModuleName()
    {
        $patsParts = explode('/',$this->path);
        return ucfirst($patsParts[2]);
    }

    public function getControllerName()
    {
        $patsParts = explode('/',$this->path);
        return ucfirst($patsParts[3]);
    }

    public function getActionName()
    {
        $patsParts = explode('/',$this->path);
        return ucfirst($patsParts[4]);
    }

    public function getParams()
    {
        $params = [];
        $patsParts = explode('/',$this->path);
        $params[$patsParts[5]] = $patsParts[6];
        return $params;
    }
    public function getParam($name, $default = null)
    {
        $patsParts = explode('/',$this->path);
        if($patsParts[6]){
            return $param[$name]=$patsParts[6];
        }
        return $default;
    }
}
