<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

declare(strict_types=1);

namespace App\Core\Block;

use App\Catalog\Block\CategoryList;

class Page
{
    private $title;

    /**
     * @var
     */
    private $mainContentBlock;

    /**
     * @var CategoryList
     */
    private $categoryListBlock;

    /**
     * @var string
     */
    public string $template = '';

    /**
     * Page constructor.
     *
     * @param \App\Catalog\Block\CategoryList $categoryListBlock
     */
    public function __construct(CategoryList $categoryListBlock)
    {
        $this->categoryListBlock = $categoryListBlock;
    }

    /**
     * @return CategoryList
     */
    public function getCategoryList(): CategoryList
    {
        return $this->categoryListBlock;
    }

    /**
     * @param $title
     * @return string
     */
    public function setTitle($title): string
    {
        return $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function setTemplate($template): string
    {
        return $this->template = $template;
    }


    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param object
     */
    public function setMainContentBlock($contentBlock)
    {
        return $this->mainContentBlock = $contentBlock;
    }

    /**
     * @return mixed
     */
    public function getMainContentBlock()
    {
        return $this->mainContentBlock;
    }

    /**
     * @return int
     */
    public function render(): int
    {
        if (empty($this->getTemplate()))
        {
            return  include BP.'/App/Core/view/templates/page.phtml';
        }

        return  include BP . $this->getTemplate();
    }

}
