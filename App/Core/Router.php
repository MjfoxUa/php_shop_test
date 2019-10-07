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


use App\Catalog\Model\Category;

class Router
{
    private $objectManager;
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function match()
    {
        $request = $this->objectManager->get(\App\Core\Request::class, ['path' => $_SERVER['REQUEST_URI']]);
        $module = $request->getModuleName();
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        $resultAction = "\App\\" . $module . "\\Controller\\" . $controller . "\\" . $action;

        if (class_exists($resultAction)) {
            $action = $this->objectManager->get($resultAction);
        } else {
            $module = 'Core';
            $controller = 'Error';
            $action = 'View';
            $resultAction = "\App\\" . $module . "\\Controller\\" . $controller . "\\" . $action;
            $action = $this->objectManager->get($resultAction);
        }
        return $action;
    }
}
