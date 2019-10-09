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

namespace App\Catalog\Block;

class ProductEdit extends Block
{
    public $product;

    /**
     * @var \App\Catalog\Model\CategoryCollection
     */

    protected $templatePath = '\App\Catalog\view\Templates\Product\product_edit.phtml';

    private $categoryCollection;

    public function __construct(\App\Catalog\Model\CategoryCollection $categoryCollection,
                                \App\Catalog\Model\Product $product)
    {
        $this->categoryCollection = $categoryCollection;
        $this->product = $product;
    }

    /**
     * @return \App\Catalog\Model\Category[]
     */
    public function getCategories()
    {
        return $this->categoryCollection->getItems();
    }

    /**
     * @return \App\Catalog\Model\Product
     */
    public function getProduct(){
        return $this->product;
    }

    /**
     * @param $product
     */
    public function setProduct($product){
        $this->product = $product;
    }
}
