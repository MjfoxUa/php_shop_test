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
     * @var \App\Catalog\Block\ProductList
     */
    private $productList;

    /**
     * View constructor.
     *
     * @param \App\Core\Block\Page              $page
     * @param \App\Catalog\Model\ProductFactory $productFactory
     * @param \App\Core\Request                 $request
     * @param \App\Catalog\Block\CategoryView   $categoryView
     * @param \App\Catalog\Block\ProductList    $productList
     */
    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Model\ProductFactory $productFactory,
        \App\Core\Request $request,
        \App\Catalog\Block\CategoryView $categoryView,
        \App\Catalog\Block\ProductList $productList
    ) {

        $this->page = $page;
        $this->productFactory = $productFactory;
        $this->request = $request;
        $this->categoryView = $categoryView;
        $this->productList = $productList;
    }

    public function execute()
    {
        $name = $this->request->getParam('sort');
        $direction = $this->request->getParam('order');
        $categoryUrl = $this->request->getParam('url');
        $this->page->setTitle(ucfirst($categoryUrl));
        $this->productList->setCategory($categoryUrl);
        if($name){
            $this->productList->setOrder($name, $direction);
        }
        $this->page->setMainContentBlock($this->productList);
        $this->page->render();
    }
}
