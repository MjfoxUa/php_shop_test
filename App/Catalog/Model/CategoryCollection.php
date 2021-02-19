<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

declare(strict_types=1);

namespace App\Catalog\Model;

use App\Core\DbAdapter;

class CategoryCollection
{
    /**
     * @var CategoryFactory
     */
    private $categoryFactory;

    /**
     * @var DbAdapter
     */
    private $dbAdapter;

    /**
     * @var $items
     */
    private $items;

    /**
     * @var bool
     */
    private $loaded = false;

    /**
     * CategoryCollection constructor.
     *
     * @param \App\Core\DbAdapter       $dbAdapter
     * @param CategoryFactory $categoryFactory
     */
    public function __construct(
        DbAdapter $dbAdapter,
        CategoryFactory $categoryFactory
    ) {
        $this->dbAdapter = $dbAdapter;
        $this->categoryFactory = $categoryFactory;
    }

    public function load()
    {
        if (!$this->loaded){
            $categoriesData = $this->dbAdapter->select("SELECT * FROM `category`");
            foreach ( $categoriesData as $categoryData){
                $category =  $this->categoryFactory->create();
                $category->setName($categoryData['name']);
                $category->setUrl($categoryData['url']);
                $category->setId($categoryData['id']);
                $this->items[] = $category;
            }
            $this->loaded = true;
        }
        return $this;
    }

    public function getItems()
    {
        $this->load();
        return $this->items;
    }
}
