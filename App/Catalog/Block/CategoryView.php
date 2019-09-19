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

class CategoryView extends Block
{
    private $categoryListById;
    protected $templatePath = '\App\Catalog\view\Templates\Category\menu.phtml';

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
}
