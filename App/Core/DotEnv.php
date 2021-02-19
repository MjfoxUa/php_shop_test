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

class DotEnv
{
    /**
     * @var array
     */
    private $cache = [];

    /**
     * DotEnv constructor.
     */
    public function __construct()
    {
        $dotEnv = \Dotenv\Dotenv::create('.');
        $dotEnv->load();
        $dotEnv->required(
            [
                DbAdapter::ENV_FIELD_DB_HOST,
                DbAdapter::ENV_FIELD_DB_NAME,
                DbAdapter::ENV_FIELD_DB_USER_LOGIN,
                DbAdapter::ENV_FIELD_DB_USER_PASS,
            ]
        );
    }

    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getValue($key, $default = null)
    {
        if (array_key_exists($key, $this->cache)) {
            return $this->cache[$key];
        }

        $value = getenv($key);

        if ($value === false) {
            $this->cache[$key] = $default;
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                $this->cache[$key] = true;
                return true;

            case 'false':
            case '(false)':
                $this->cache[$key] = false;
                return false;

            case 'empty':
            case '(empty)':
                $this->cache[$key] = '';
                return '';

            case 'null':
            case '(null)':
                $this->cache[$key] = null;
                return null;
        }

        if ($this->startsWith($value, '"') && $this->endsWith($value, '"')) {
            $result = substr($value, 1, -1);
            $this->cache[$key] = $result;
            return $this->cache[$key];
        }

        return $value;
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param string       $haystack
     * @param string|array $needles
     *
     * @return bool
     */
    public function startsWith($haystack, $needles) : bool
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && strpos($haystack, $needle) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param string       $haystack
     * @param string|array $needles
     *
     * @return bool
     */
    public function endsWith($haystack, $needles) : bool
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle === substr($haystack, -strlen($needle))) {
                return true;
            }
        }

        return false;
    }
}
