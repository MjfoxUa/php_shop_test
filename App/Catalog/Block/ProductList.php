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

    public function getPageCount()
    {
        return $this->productCollection->getPageCount();
    }

    public function getPage()
    {
        return $this->productCollection->page;
    }

    public function setOrder($name, $direction)
    {
        $this->productCollection->setOrder($name, $direction);
        return $this;
    }

    public function setPage($page)
    {
        $this->productCollection->page = $page;
        $this->productCollection->setCurrentPage($page);
        return $this;
    }

    public function setSearch($searchString)
    {
        $this->productCollection->setSearch($searchString);
        return $this;
    }

    private function updateQueryString($paramKey, $paramValue)
    {
        $params = $_GET;
        $params[$paramKey] = $paramValue;
        $result = [];
        foreach ($params as $key => $value){
            $result[] = $key . '=' . $value;
        }
        return '?' . implode("&", $result);
    }

    public function getOrderUrl($paramValue)
    {
        return $this->updateQueryString('order', $paramValue);
    }

    public function getSortUrl($paramValue)
    {
        return $this->updateQueryString('sort', $paramValue);
    }

    public function getToPageUrl($paramValue)
    {
        return $this->updateQueryString('page', $paramValue);
    }
}
