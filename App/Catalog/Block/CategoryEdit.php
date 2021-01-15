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

class CategoryEdit extends Block
{

    /**
     * @var \App\Catalog\Model\CategoryCollection
     */
    private $categoryCollection;

    protected $templatePath = '/App/Catalog/view/Templates/Category/category_edit.phtml';
    /**
     * @var \App\Catalog\Model\Category
     */
    private $category;

    public function __construct(\App\Catalog\Model\CategoryCollection $categoryCollection,
                                \App\Catalog\Model\Category $category)
    {
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
