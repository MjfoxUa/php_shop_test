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
     * @var \App\Core\Request
     */
    private $request;

    /**
     * View constructor.
     *
     * @param \App\Core\Block\Page              $page
     * @param \App\Catalog\Block\ProductList    $productList
     * @param \App\Catalog\Model\ProductFactory $productFactory
     */
    public function __construct(
        \App\Core\Block\Page $page,
        \App\Core\Request $request,
        \App\Catalog\Block\ProductList $productList,
        \App\Catalog\Model\ProductFactory $productFactory

    ) {
        $this->productList = $productList;
        $this->page = $page;
        $this->productFactory = $productFactory;
        $this->request = $request;
    }

    public function execute()
    {
        $this->page->setTitle('Home');
        $name = $this->request->getParam('sort');
        $page = $this->request->getParam('page');
        $direction = $this->request->getParam('order');
        $this->productList->setPage($page);
        if($name){
            $this->productList->setOrder($name, $direction);
        }
        $this->page->setMainContentBlock($this->productList);
        $this->page->render();
    }
}
