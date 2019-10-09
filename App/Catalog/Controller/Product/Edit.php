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

class Edit
{

    /**
     * @var \App\Core\Block\Page
     */
    private $page;
    /**
     * @var \App\Catalog\Block\ProductEdit
     */
    private $productEdit;
    /**
     * @var \App\Core\Request
     */
    private $request;
    /**
     * @var \App\Catalog\Model\ProductFactory
     */
    private $productFactory;

    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Block\ProductEdit $productEdit,
        \App\Core\Request $request,
        \App\Catalog\Model\ProductFactory $productFactory
    ) {

        $this->page = $page;
        $this->productEdit = $productEdit;
        $this->request = $request;
        $this->productFactory = $productFactory;
    }
    public function execute(){
        $this->page->setTitle('Edit product');
        $id = $this->request->getParam('id');
        $product = $this->productFactory->create();
        $product->load($id);
        $this->productEdit->setProduct($product);
        $this->page->setMainContentBlock($this->productEdit);
        $this->page->render();
    }
}
