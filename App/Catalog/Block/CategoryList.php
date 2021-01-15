<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox SHOP
 * @copyright   Copyright (c) 2020 MjFox Inc.
 * @license     End-user License Agreement
 */

namespace App\Catalog\Block;

use App\Catalog\Model\CategoryCollection;

class CategoryList extends Block
{
    /**
     * @var CategoryCollection
     */
    private $categoryCollection;

    /**
     * @var string
     */
    protected $templatePath = '/App/Catalog/view/Templates/Category/category_list.phtml';

    /**
     * CategoryList constructor.
     *
     * @param \App\Catalog\Model\CategoryCollection $categoryCollection
     */
    public function __construct(CategoryCollection $categoryCollection)
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
