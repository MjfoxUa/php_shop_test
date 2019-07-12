<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */


include_once './bootstrap.php';

/** @var \App\core\DbAdapter $db */
$db= $objectManager->create(\App\core\DbAdapter::class);

$pathUri=$_SERVER['REQUEST_URI'];

/** @var \App\core\Request $request */
$request = $objectManager->get(\App\core\Request::class,['path'=>$pathUri]);

//echo $request->getModuleName();
//echo $request->getActionName();
//echo $request->getControllerName();
//var_dump($request->getParams());
//var_dump($request->getParam('id'));

/** @var \App\core\Controller $controller */
$controller = $objectManager->create(\App\core\Controller::class,['request'=>$request->getControllerName()]);

$controller->loadController();