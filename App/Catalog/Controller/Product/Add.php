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

class Add implements \App\Catalog\Controller\ActionInterface
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
     * @var \App\Catalog\Block\ProductEdit
     */
    private $productEdit;

    /**
     * Add constructor.
     *
     * @param \App\Core\Block\Page              $page
     * @param \App\Catalog\Model\ProductFactory $productFactory
     * @param \App\Catalog\Block\ProductEdit    $productEdit
     */
    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Model\ProductFactory $productFactory,
        \App\Catalog\Block\ProductEdit $productEdit
    ) {
        $this->page = $page;
        $this->productFactory = $productFactory;
        $this->productEdit = $productEdit;
    }

    public function execute()
    {
        $this->page->setTitle('Add product');
        $product = $this->productFactory->create();
        $this->productEdit->setProduct($product);
        $this->page->setMainContentBlock($this->productEdit);
        $this->page->render();
    }
}
