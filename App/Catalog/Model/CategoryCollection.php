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

class CategoryCollection
{
    private $categoryFactory;
    private $dbAdapter;
    private $items;

    /**
     * @var bool
     */
    private $loaded = false;

    public function __construct(\App\Core\DbAdapter $dbAdapter, CategoryFactory $categoryFactory )
    {
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
