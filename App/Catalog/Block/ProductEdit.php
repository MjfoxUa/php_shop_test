<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

namespace App\Catalog\Block;

use App\Catalog\Model\CategoryCollection;
use App\Catalog\Model\Product;

class ProductEdit extends Block
{
    public $product;

    /**
     * @var CategoryCollection
     */

    protected $templatePath = '/App/Catalog/view/Templates/Product/product_edit.phtml';

    private $categoryCollection;

    /**
     * ProductEdit constructor.
     *
     * @param CategoryCollection $categoryCollection
     * @param Product            $product
     */
    public function __construct(
        CategoryCollection $categoryCollection,
        Product $product
    ){
        $this->categoryCollection = $categoryCollection;
        $this->product = $product;
    }

    /**
     * @return \App\Catalog\Model\Category[]
     */
    public function getCategories(): array
    {
        return $this->categoryCollection->getItems();
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param $product
     */
    public function setProduct($product): void
    {
        $this->product = $product;
    }
}
