<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

namespace App\Core;

use Di\ObjectManagerInterface;

class Router
{
    public function __construct(
        private ObjectManagerInterface $objectManager
    ) {}

    /**
     * @return string|bool|Object
     */
    public function match() : string|bool|object
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
