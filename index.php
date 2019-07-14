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

/** @var \App\Core\DbAdapter $db */
$db= $objectManager->create(\App\Core\DbAdapter::class);


/** @var \App\Core\Request $request */
$request = $objectManager->get(\App\Core\Request::class,['path' =>$_SERVER['REQUEST_URI']]);

//echo $request->getModuleName();
//echo $request->getActionName();
//echo $request->getControllerName();
//var_dump($request->getParams());
//var_dump($request->getParam('id'));

/** @var \App\Core\Controller $controller */
$controller = $objectManager->create(\App\Core\Controller::class,['request' =>$request->getControllerName()]);

$controller->loadController();

/** @var \App\Core\Request $request */
$request = $objectManager->get(\App\Core\Request::class,['path' => $_SERVER['REQUEST_URI']]);

/** @var \App\Core\Router $router */
$router = $objectManager->get(\App\Core\Router::class);
$router->match()->exeaute();

//try {
//    $controller = $router->match();
//    $result->render();
//} catch (\Exception $exception) {
//    var_dump($exception->getMessage());
//}









