<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Block;

class ProductList extends Block
{
    private $product;
    /**
     * @var \App\Catalog\Model\CategoryFactory
     */
    private $categoryFactory;
    /**
     * @var \App\Catalog\Model\ProductCollection
     */
    private $productCollection;

    protected $templatePath = '\App\Core\view\templates\product_list.phtml';


    public function __construct(\App\Catalog\Model\CategoryFactory $categoryFactory, \App\Catalog\Model\ProductCollection $productCollection)
    {
        $this->categoryFactory = $categoryFactory;
        $this->productCollection = $productCollection;
    }

    /**
     * @return \App\Catalog\Model\Product[]
     */
    public function getProduct(){
        return $this->productCollection->getItems();
    }

    public function setCategory($categoryUrl)
    {
        $category = $this->categoryFactory->create()->load($categoryUrl, 'url');
        $this->productCollection->setCategoryFilter($category->getId());
        return $this;
    }
}
