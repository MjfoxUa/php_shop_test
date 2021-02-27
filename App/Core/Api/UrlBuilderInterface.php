<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

namespace App\Core\Api;

interface UrlBuilderInterface
{
    /**
     * Returns base url of site
     *
     * @return string
     */
    public function getBaseUrl(): string;

    /**
     * Create absolute url for specified route and params
     *
     * @param string $route
     * @param array  $params
     * @return string
     */
    public function getUrl(string $route, array $params = []): string;
}
