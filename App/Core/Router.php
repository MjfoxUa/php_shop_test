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


class Router
{
    private $objectManager;
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function match()
    {
        //$request = $this->objectManager->get(\App\Core\Request::class,['path' => $_SERVER['REQUEST_URI']]);
        $request = $this->objectManager->get('App\Core\Request',['path' => $_SERVER['REQUEST_URI']]);

        var_dump(\App\Core\Request::class);

        $module = $request->getModuleName();
        var_dump( $request->getModuleName());
        $controller = $request->getControllerName();
        var_dump( $request->getControllerName());
        $action = $request->getActionName();
        $resultAction = "\App\\".$module."\\Controller\\".$controller."\\".$action;
        var_dump($resultAction);
        if (class_exists($resultAction)) {
            $action = $this->objectManager->get($resultAction);
        }else{
            echo 'ERROR 4089';
        }
        return $action;
    }
}
