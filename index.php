<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2020 MjFox Inc.
 * @license     End-user License Agreement
 */

include_once('./bootstrap.php');

/** @var \App\Core\Request $request */
$request = $objectManager->get(\App\Core\Request::class, ['path' => $_SERVER['REQUEST_URI']]);

/** @var \App\Core\Router $router */
$router = $objectManager->get(\App\Core\Router::class);
$router->match()->execute();
