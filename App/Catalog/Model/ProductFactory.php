<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Model;

use Di\ObjectManagerInterface;

class ProductFactory
{
    public function __construct(
        private ObjectManagerInterface $objectManager
    ) {}

    /**
     * @return object|Product
     */
    public function create()
    {
        return $this->objectManager->create(Product::class);
    }
}
