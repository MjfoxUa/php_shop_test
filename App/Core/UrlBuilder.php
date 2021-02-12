<?php
/**
 * Plumrocket Inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the End-user License Agreement
 * that is available through the world-wide-web at this URL:
 * http://wiki.plumrocket.net/wiki/EULA
 * If you are unable to obtain it through the world-wide-web, please
 * send an email to support@plumrocket.com so we can send you a copy immediately.
 *
 * @package     Plumrocket_php_shop_test
 * @copyright   Copyright (c) 2021 Plumrocket Inc. (http://www.plumrocket.com)
 * @license     http://wiki.plumrocket.net/wiki/EULA  End-user License Agreement
 */

declare(strict_types=1);

namespace App\Core;

class UrlBuilder implements \App\Core\Api\UrlBuilderInterface
{
    public const ENV_FIELD_BASE_URL = 'WEB_BASE_URL';

    private string $baseUrl;

    public function __construct(DotEnv $dotEnv)
    {
        $this->baseUrl = (string) $dotEnv->getValue(self::ENV_FIELD_BASE_URL);
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @inheritDoc
     * TODO: add support of $params
     */
    public function getUrl(string $route, array $params = []): string
    {
        return $this->getBaseUrl() . $route;
    }
}
