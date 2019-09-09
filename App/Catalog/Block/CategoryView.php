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

class CategoryView
{
    private $categoryListById;

    /**
     * @return mixed     */
    public function getCategoryListById(){
        return $this->categoryListById;
    }

    /**
     * @param $categoryListById
     */
    public function setCategoryListById($categoryListById){
        $this->categoryListById = $categoryListById;
    }

    public function toHtml()
    {
        $block = $this;
        ob_start();
        include BP.'\App\Catalog\view\Templates\Category\category_list_by_id.phtml';
        $a = ob_get_contents();
        ob_clean();
        return $a;
    }
}
