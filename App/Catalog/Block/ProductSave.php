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

namespace App\Catalog\Block;

class ProductSave extends Block
{
    private $productSave;
    protected $templatePath = '\App\Catalog\view\Templates\Product\product_save.phtml';

    /**
     * @return \App\Catalog\Model\ProductSave
     */
    public function getProductSave(){
        return $this->productSave;
    }

    /**
     * @param $product
     */
    public function setProduct($productSave){
        $this->productSave = $productSave;
    }
}
