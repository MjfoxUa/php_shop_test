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

use App\Catalog\Model\Category;
use App\Catalog\Model\CategoryCollection;

class CategoryEdit extends Block
{

    /**
     * @var CategoryCollection
     */
    private $categoryCollection;

    protected $templatePath = '/App/Catalog/view/Templates/Category/category_edit.phtml';
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryEdit constructor.
     *
     * @param \App\Catalog\Model\CategoryCollection $categoryCollection
     * @param \App\Catalog\Model\Category           $category
     */
    public function __construct(
        CategoryCollection $categoryCollection,
        Category $category
    ) {
        $this->categoryCollection = $categoryCollection;
        $this->category = $category;
    }

    public function getCategorys()
    {
        return $this->categoryCollection->getItems();
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
}
