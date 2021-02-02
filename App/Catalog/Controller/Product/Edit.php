<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

declare(strict_types=1);

namespace App\Catalog\Controller\Product;

use App\Catalog\Block\ProductEdit;
use App\Catalog\Controller\ActionInterface;
use App\Catalog\Model\ProductFactory;
use App\Core\Block\Page;
use App\Core\Request;

class Edit implements ActionInterface
{
    /**
     * @var Page
     */
    private $page;

    /**
     * @var ProductEdit
     */
    private $productEdit;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * @param \App\Core\Block\Page              $page
     * @param \App\Catalog\Block\ProductEdit    $productEdit
     * @param \App\Core\Request                 $request
     * @param \App\Catalog\Model\ProductFactory $productFactory
     */
    public function __construct(
        Page $page,
        ProductEdit $productEdit,
        Request $request,
        ProductFactory $productFactory
    ) {
        $this->page = $page;
        $this->productEdit = $productEdit;
        $this->request = $request;
        $this->productFactory = $productFactory;
    }

    public function execute()
    {
        $this->page->setTitle('Edit product');
        $id = $this->request->getParam('id');
        $product = $this->productFactory->create();
        $product->load($id);
        $this->productEdit->setProduct($product);
        $this->page->setMainContentBlock($this->productEdit);
        $this->page->render();
    }
}
