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
    private $category;

    /**
     * @return \App\Catalog\Model\Category
     */
    public function getCategory(){
        return $this->category;
    }

    /**
     * @param $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
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
