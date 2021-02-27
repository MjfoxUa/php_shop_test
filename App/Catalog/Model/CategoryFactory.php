<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2021 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Model;

use Di\ObjectManagerInterface;

class CategoryFactory
{
    public function __construct(
        private ObjectManagerInterface $objectManager
    ) {}

    /**
     * @return object|Category
     */
    public function create()
    {
        return $this->objectManager->create(Category::class);
    }
}
