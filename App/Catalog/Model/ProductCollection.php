<?php
/**
 * Plumrocket Inc.
 * NOTICE OF LICENSE
 * This source file is subject to the End-user License Agreement
 * that is available through the world-wide-web at this URL:
 * http://wiki.plumrocket.net/wiki/EULA
 * If you are unable to obtain it through the world-wide-web, please
 * send an email to support@plumrocket.com so we can send you a copy immediately.
 *
 * @package     Plumrocket shop
 * @copyright   Copyright (c) 2019 Plumrocket Inc. (http://www.plumrocket.com)
 * @license     http://wiki.plumrocket.net/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Model;

class ProductCollection
{
    private $productFactory;
    private $dbAdapter;
    private $items= [];
    private $categoryId;
    private $order;
    public  $search;
    public  $page;
    public  $resultsPerPage = 4;
    public  $pageCount;
    public  $pageFirstResult;

    public function __construct(\App\Core\DbAdapter $dbAdapter, ProductFactory $productFactory )
    {
        $this->dbAdapter = $dbAdapter;
        $this->productFactory = $productFactory;
    }

    public function setCategoryFilter($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }


    public function load()
    {
        $main = 'SELECT products.*, category.name AS category_name FROM products LEFT JOIN category ON products.category=category.id';
        $where = '';
        $limit = '';

        if ($this->categoryId) {
            $where = "WHERE `category` = '$this->categoryId'";
        }

        if($this->getCurrentPage()){
            $this->setCurrentPage($this->getCurrentPage());
            $this->getPage();
            $this->pageFirstResult();
            $this->getPageCount();
            $this->getSize();
            $limit = "LIMIT $this->pageFirstResult, $this->resultsPerPage";
        }

        if($this->search) {
            $where = "WHERE products.name  LIKE '%{$this->search}%' OR `description`  LIKE '%{$this->search}%' OR `sku`  LIKE '%{$this->search}%'";
        }

        $sort = $this->order;
        $productsData = $this->dbAdapter->select("$main $where $sort $limit");
        foreach ( $productsData as $productData) {
            $product = $this->productFactory->create();
            $product->setId($productData['id']);
            $product->setName($productData['name']);
            $product->setSku($productData['sku']);
            $product->setPrice($productData['price']);
            $product->setImage($productData['image']);
            $product->setCategory($productData['category']);
            $product->setDescription($productData['description']);
            $product->setCreateAt($productData['create_at']);
            $product->setUpdateAt($productData['update_at']);
            $product->setCategoryName($productData['category_name']);
            $this->items[] = $product;
        }
        return $this;
    }

    public function pageFirstResult()
    {
       $this->pageFirstResult = ($this->getCurrentPage() - 1) * $this->resultsPerPage;
       return (int) $this->pageFirstResult;
    }

    public function getPageCount()
    {
        $sizeOf = $this->getSize();
        $this->pageCount = ceil($sizeOf/$this->resultsPerPage);
        return (int) $this->pageCount;
    }

    public function getSize()
    {
        $main = 'SELECT COUNT(id) as count FROM products';
        $where = '';
        if ($this->categoryId) {
            $where = "WHERE `category` = '$this->categoryId'";
        }
        $result = $this->dbAdapter->select("$main $where ");
        return  $result[0]["count"];
    }

    public function getCurrentPage()
    {
        if(!$this->page){
            return 1;
        } else
        return $this->page;
    }

    public function setCurrentPage($page)
    {
        if(is_numeric($page)){
            if($page < 1){
                $this->page = 1;
                } elseif($page > $this->getPageCount()){
                $this->page = $this->getPageCount();
            } else{
                $this->page = $page;
            }
        }else{
            $this->page = 1;
        }
    }

    public function setSearch($string)
    {
        $this->search = $string;
        return $this;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setOrder($name,$direction)
    {
        $direction = strtoupper($direction);
        $this->order = "ORDER BY `$name` $direction";
        return $this;
    }
    
    public function getItems()
    {
        $this->load();
        return $this->items;
    }
}
