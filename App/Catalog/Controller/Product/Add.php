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

namespace App\Catalog\Controller\Product;

class Add
{
    /**
     * @var \App\Catalog\Block\ProductAdd
     */
    private $productAdd;

    /**
     * @var \App\Core\Block\Page
     */
    private $page;

    /**
     * Add constructor.
     *
     * @param \App\Core\Block\Page          $page
     * @param \App\Catalog\Block\ProductAdd $productAdd
     */
    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Block\ProductAdd $productAdd
    ) {
        $this->productAdd = $productAdd;
        $this->page = $page;
    }

    public function execute()
    {
        $this->page->setTitle('Add');
        $this->page->setMainContentBlock($this->productAdd);
        $this->page->render();

    }
}
