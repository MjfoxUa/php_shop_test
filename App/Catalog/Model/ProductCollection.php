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
        if ($this->categoryId) {
            $sql = "SELECT products.*, category.name AS category_name 
                                                     FROM products LEFT JOIN category 
                                                     ON products.category=category.id 
                                                     WHERE `category` = '$this->categoryId'";
            }else
            $sql = "SELECT products.*, category.name AS category_name 
                                                     FROM products LEFT JOIN category 
                                                     ON products.category=category.id";
            $productsData = $this->dbAdapter->select($sql);
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
                $this->items [] = $product;
                }
        return $this;
    }

    public function getItems()
    {
        $this->load();
        return $this->items;
    }
}
