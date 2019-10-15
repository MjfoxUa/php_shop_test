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

namespace App\Catalog\Controller\Search;

class Result
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
        $name = $this->request->getParam('sort');
        $direction = $this->request->getParam('order');
        $searchString = $this->request->getParam('q');
        $this->page->setTitle('Search result for: \''.$searchString.'\'');
        if($name){
            $this->productList->setOrder($name, $direction);
        }
        if($searchString){
            $this->productList->setSearch($searchString);
        }
        $this->page->setMainContentBlock($this->productList);
        $this->page->render();
    }
}
