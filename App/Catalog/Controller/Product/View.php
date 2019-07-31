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

class View
{

    /**
     * @var \App\Core\Block\Page
     */
    private $page;
    private $productList;

    public function __construct(\App\Core\Block\Page $page, \App\Catalog\Block\ProductList $productList)
    {
        $this->productList = $productList;
        $this->page = $page;
    }

    public function execute()
    {
        $this->page->setTitle('Product');
        $this->page->setMainContent($this->productList);
        $this->page->getMainContent();
        $this->page->render();
    }
}
