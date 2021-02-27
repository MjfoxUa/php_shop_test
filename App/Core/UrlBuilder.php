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

