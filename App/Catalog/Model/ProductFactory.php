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

use App\Core\ObjectManager;

class ProductFactory
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * ProductFactory constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @return bool|Product
     */
    public function create()
    {
        return $this->objectManager->create(Product::class);
    }
}
