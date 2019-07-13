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

class Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function loadController()
    {
        var_dump(!$this->request->getControllerName());
        var_dump('../controller/'.$this->request->getControllerName().'.php');
        if(!file_exists('../controller/'.$this->request->getControllerName().'.php')){
            echo 'ERROR';
        }
       return '1';
    }

}
