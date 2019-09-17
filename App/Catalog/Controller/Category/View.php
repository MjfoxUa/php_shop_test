<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Controller\Category;

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
     * @var \App\Core\Request
     */
    private $request;

    /**
     * @var \App\Catalog\Block\CategoryView
     */
    private $categoryView;

    /**
     * View constructor.
     *
     * @param \App\Core\Block\Page              $page
     * @param \App\Catalog\Model\ProductFactory $productFactory
     * @param \App\Core\Request                 $request
     * @param \App\Catalog\Block\CategoryView   $categoryView
     */
    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Model\ProductFactory $productFactory,
        \App\Core\Request $request,
        \App\Catalog\Block\CategoryView $categoryView
    ) {

        $this->page = $page;
        $this->productFactory = $productFactory;
        $this->request = $request;
        $this->categoryView = $categoryView;
    }

    public function execute()
    {
        $categoryID = key($this->request->getParams());
        $product = $this->productFactory->create();
        $product->loadProducts();
        $this->page->setTitle(ucfirst($categoryID));
        $productList = $product->getProductList();

        $categoryListById = [];
        $k = 0;
        foreach ($productList as $products){
            if($products['category'] === $categoryID){
                $categoryListById[$k] = $products;
            }
            $k++;
        }

        $this->categoryView->setCategoryListById($categoryListById);

        $this->page->setMainContentBlock($this->categoryView);
        $this->page->render();
    }
}
