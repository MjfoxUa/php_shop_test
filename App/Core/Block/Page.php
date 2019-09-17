<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Core\Block;

class Page
{
    private $title;
    private $mainContentBlock;
    /**
     * @var \App\Catalog\Block\CategoryList
     */
    private $categoryListBlock;

    public function __construct(\App\Catalog\Block\CategoryList $categoryListBlock)
    {
        $this->categoryListBlock = $categoryListBlock;
    }

    public function getCategoryList()
    {
        return $this->categoryListBlock;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setMainContentBlock($contentBlock)
    {
        $this->mainContentBlock = $contentBlock;
    }
    public function getMainContentBlock()
    {
        return $this->mainContentBlock;
    }
    public function render()
    {
        include BP.'\App\Core\view\templates\page.phtml';
    }

}
