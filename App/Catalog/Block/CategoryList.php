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

class CategoryList extends Block
{
    /**
     * @var \App\Catalog\Model\CategoryCollection
     */
    private $categoryCollection;

    /**
     * @var string
     */
    protected $templatePath = '\App\Catalog\view\Templates\Category\category_list.phtml';

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

}
