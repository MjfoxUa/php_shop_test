<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
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
