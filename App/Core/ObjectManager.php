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

class ObjectManager
{
    /**
     * @var array
     */
    private static $instance = [];


    /**
     * @return ObjectManager|null
     */
    public static function getInstance()
    {
        if (! isset(self::$instance[self::class])) {
            self::$instance[self::class] = new self();
        }
        return self::$instance[self::class];
    }

    private function __clone() {}
    private function __construct() {}

    public function create(string $type, array $arguments = [])
    {
        try {
            $reflection = new \ReflectionClass($type);

            $constructor = $reflection->getConstructor();

            $params = [];
            if ($constructor) {
                foreach ($constructor->getParameters() as $parameter) {
                    $params[$parameter->getName()] = [
                        'class' => $parameter->getClass() ? $parameter->getClass()->getName() : false,
                        'value' => $parameter->isOptional() ? $parameter->getDefaultValue() : false,
                    ];
                }

                $params = $this->resolveArguments($params, $arguments);
            }
        } catch (\ReflectionException $e) {
            return false;
        }

        return new $type(...$params);
    }

    /**
     * @param string $type
     * @param array  $arguments
     * @return bool|Object
     */
    public function get(string $type, array $arguments = [])
    {
        if (! isset(self::$instance[$type])) {
            self::$instance[$type] = $this->create($type, $arguments);
        }

        return self::$instance[$type];
    }

    /**
     * @param array $params
     * @param array $arguments
     * @return array
     */
    private function resolveArguments(array $params, array $arguments) : array
    {
        $result = [];
        foreach ($params as $key => $param) {
            if (isset($arguments[$key])) {
                $param['value'] = $arguments[$key];
            }

            if ($param['class']) {
                $result[] = $this->get($param['class']);
            } else {
                $result[] = $param['value'];
            }
        }

        return $result;
    }
}
