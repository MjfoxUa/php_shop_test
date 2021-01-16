<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

declare(strict_types=1);

namespace App\Core;

class Request
{
    /**
     * @var false|string
     */
    public false|string $path;


    public $currentUrl;

    /**
     * @param $path
     */
    public function __construct($path)
    {
        $this->currentUrl = $path;

        if(strpos($path, '?' ) === false)
        {
            $this->path = $path;
        }else{
            $this->path = strstr($path, '?', true);
        }
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        $pathsParts = $this->getParts();
        if (isset($pathsParts[1])) {
            return ucfirst($pathsParts[1]);
        }

        return 'Core';
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        $pathsParts = $this->getParts();
        if (isset($pathsParts[2])) {
            return ucfirst($pathsParts[2]);
        }

        return 'Home';
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        $pathsParts = $this->getParts();
        if (isset($pathsParts[3])) {
            return ucfirst($pathsParts[3]);
        }

        return 'View';
    }

    /**
     * @return false|string[]
     */
    private function getParts()
    {
        return explode('/', trim($this->path, '/'));
    }

    /**
     * @return array
     */
    public function getParams(): array
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

    public function getSingleActionParat(){
        return $this->getParts()[4];
    }

    public function getCurrentUrl()
    {
        return $this->currentUrl;
    }
}
