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
     * @var \App\Catalog\Model\Category
     */
    private $category;

    /**
     * @var
     */
    private $categoryFactory;

    /**
     * @var \App\Catalog\Block\CategoryList
     */
    private $categoryList;

    /**
     * @var \App\Catalog\Block\CategoryView
     */
    private $categoryView;

    /**
     * View constructor.
     *
     * @param \App\Core\Block\Page               $page
     * @param \App\Catalog\Block\CategoryList    $categoryList
     * @param \App\Catalog\Block\ProductView     $productView
     * @param \App\Catalog\Model\ProductFactory  $productFactory
     * @param \App\Catalog\Model\CategoryFactory $categoryFactory
     * @param \App\Core\Request                  $request
     * @param \App\Catalog\Model\Category        $category
     * @param \App\Catalog\Block\CategoryView    $categoryView
     */
    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Block\CategoryList $categoryList,
        \App\Catalog\Block\ProductView $productView,
        \App\Catalog\Model\ProductFactory $productFactory,
        \App\Catalog\Model\CategoryFactory $categoryFactory,
        \App\Core\Request $request,
        \App\Catalog\Model\Category $category,
        \App\Catalog\Block\CategoryView $categoryView
    ) {
        $this->productView = $productView;
        $this->page = $page;
        $this->productFactory = $productFactory;
        $this->categoryFactory = $categoryFactory;
        $this->request = $request;
        $this->category = $category;
        $this->categoryList = $categoryList;
        $this->categoryView = $categoryView;

    }

    public function execute()
    {

        $category = $this->categoryFactory->create();
        $category->loadCategorys();
        $category->getCategorys();
        $this->categoryList->setCategory($category);
        $this->page->setCategoryList($this->categoryList);
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
