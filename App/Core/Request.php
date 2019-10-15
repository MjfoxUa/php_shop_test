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
    public $currentUrl;

    public function __construct($path)
    {
        $this->currentUrl = $path;

        if(strpos($path, '?' ) === false){
            $this->path = $path;
        }else{
            $this->path = strstr($path, '?', true);
        }
    }


    public function getModuleName()
    {
        $pathsParts = $this->getParts();
        if (isset($pathsParts[1])) {
            return ucfirst($pathsParts[1]);
        }
        return 'Core';
    }

    public function getControllerName()
    {
        $pathsParts = $this->getParts();
        if (isset($pathsParts[2])) {
            return ucfirst($pathsParts[2]);
        }
        return 'Home';
    }

    public function getActionName()
    {
        $pathsParts = $this->getParts();
        if (isset($pathsParts[3])) {
            return ucfirst($pathsParts[3]);
        }
        return 'View';
    }

    private function getParts()
    {
        return explode('/', trim($this->path, '/'));
    }

    public function getParams()
    {
        $params = [];
        $pathsParts = $this->getParts();
        for ($i = 4; isset($pathsParts[$i]); $i += 2) {
            $params[$pathsParts[$i]] = $pathsParts[$i + 1] ?? 0;
        }
        return array_merge($params, $_GET);
    }

    public function getParam(string $string)
    {
        if (isset($this->getParams()[$string])) {
            return $this->getParams()[$string];
        }
        return null;
    }

    public function getCurrentUrl()
    {
        return $this->currentUrl;
    }
}
