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

class CategoryList
{
    /**
     * @var \App\Catalog\Model\CategoryCollection
     */
    private $categoryCollection;


    public function __construct( \App\Catalog\Model\CategoryCollection $categoryCollection)
    {
        $this->categoryCollection = $categoryCollection;
    }

    /**
     * @return \App\Catalog\Model\Category[]
     */
    public function getCategories()
    {
        return $this->categoryCollection->getItems();
    }


    public function toHtml()
    {
        $block = $this;
        ob_start();
        include BP.'\App\Catalog\view\Templates\Category\category_list.phtml';
        $a = ob_get_contents();
        ob_clean();
        return $a;
    }
}
