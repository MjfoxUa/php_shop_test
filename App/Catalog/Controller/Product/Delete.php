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

class Delete implements \App\Catalog\Controller\ActionInterface
{

    /**
     * @var \App\Core\Request
     */
    private $request;

    /**
     * @var \App\Catalog\Model\ProductFactory
     */
    private $productFactory;

    public function __construct(\App\Core\Request $request,
                                \App\Catalog\Model\ProductFactory $productFactory)
    {
        $this->request = $request;
        $this->productFactory = $productFactory;
    }

    public function execute()
    {
        $id = $this->request->getParams();
        $product = $this->productFactory->create();
        $product->load($id['id']);
        $product->deleteProduct();
        echo  json_encode(['status' => true, 'message' => 'Product was deleted!'] );
    }
}
