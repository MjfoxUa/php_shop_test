<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Block;

class ProductView
{
    private $product;

    /**
     * @return \App\Catalog\Model\Product
     */
    public function getProduct(){
        return $this->product;
    }

    /**
     * @param $product
     */
    public function setProduct($product){
        $this->product = $product;
    }

    public function toHtml()
    {
        $block = $this;
        ob_start();
        include BP.'\App\Catalog\view\Templates\Product\product_view.phtml';
        $a = ob_get_contents();
        ob_clean();
        return $a;
    }
}
