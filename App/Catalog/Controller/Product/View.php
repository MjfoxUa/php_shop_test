<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Controller\Product;

class View implements \App\Catalog\Controller\ActionInterface
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
     * View constructor.
     *
     * @param \App\Core\Block\Page               $page
     * @param \App\Catalog\Block\CategoryList    $categoryList
     * @param \App\Catalog\Block\ProductView     $productView
     * @param \App\Catalog\Model\ProductFactory  $productFactory
     * @param \App\Catalog\Model\CategoryFactory $categoryFactory
     * @param \App\Core\Request                  $request
     * @param \App\Catalog\Model\Category        $category
     */
    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Block\CategoryList $categoryList,
        \App\Catalog\Block\ProductView $productView,
        \App\Catalog\Model\ProductFactory $productFactory,
        \App\Catalog\Model\CategoryFactory $categoryFactory,
        \App\Core\Request $request,
        \App\Catalog\Model\Category $category
    ) {
        $this->productView = $productView;
        $this->page = $page;
        $this->productFactory = $productFactory;
        $this->categoryFactory = $categoryFactory;
        $this->request = $request;
        $this->category = $category;
        $this->categoryList = $categoryList;
    }

    public function execute()
    {
        $id = $this->request->getParam('id');
        $product = $this->productFactory->create();
        $product->load($id);
        $this->productView->setProduct($product);
        $this->page->setTitle('Product');
        $this->page->setMainContentBlock($this->productView);
        $this->page->render();
    }
}
