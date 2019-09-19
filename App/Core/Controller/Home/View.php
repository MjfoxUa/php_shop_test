<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Core\Controller\Home;

class View
{

    /**
     * @var \App\Core\Block\Page
     */
    private $page;

    /**
     * @var \App\Catalog\Model\ProductFactory
     */
    private $productFactory;

    /**
     * @var \App\Catalog\Block\ProductList
     */
    private $productList;

    /**
     * View constructor.
     *
     * @param \App\Core\Block\Page              $page
     * @param \App\Catalog\Block\ProductList    $productList
     * @param \App\Catalog\Model\ProductFactory $productFactory
     */
    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Block\ProductList $productList,
        \App\Catalog\Model\ProductFactory $productFactory

    ) {
        $this->productList = $productList;
        $this->page = $page;
        $this->productFactory = $productFactory;
    }

    public function execute()
    {
//        $product = $this->productFactory->create();
//        $product->loadProducts();
//        $this->productList->setProduct($product);
        $this->page->setTitle('Home');
        $this->page->setMainContentBlock($this->productList);
        $this->page->render();
    }
}
