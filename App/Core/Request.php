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
            $pathsParts = $this->getParts();
            return ucfirst($pathsParts[1]);
        }

        public function getControllerName()
        {
            $pathsParts = $this->getParts();
            return ucfirst($pathsParts[2]);
        }

        public function getActionName()
        {
            $pathsParts = $this->getParts();
            return ucfirst($pathsParts[3]);
        }

        private function getParts()
        {
            return explode('/',trim($this->path, '/'));
        }

        public function getParams()
        {
            $params = [];
            $pathsParts = $this->getParts();
            for ($i = 4; isset($pathsParts[$i]); $i += 2){
                $params[$pathsParts[$i]] = $pathsParts[$i + 1] ?? 0;
            }
            return $params;
        }

        public function getParam(string $string)
        {
            if(isset($this->getParams()[$string])){
                return $this->getParams()[$string];
            }
            return null;
        }
}
