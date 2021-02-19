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

use App\Core\ObjectManager;

class CategoryFactory
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * CategoryFactory constructor.
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @return bool|Category
     */
    public function create()
    {
        return $this->objectManager->create(Category::class);
    }
}
