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
use App\Core\Api\UrlBuilderInterface;

class Page
{
    private $title;

    /**
     * @var string
     */
    public string $template = '';

    /**
     * @var
     */
    private $mainContentBlock;

    /**
     * @var CategoryList
     */
    private $categoryListBlock;

    /**
     * @var \App\Core\Api\UrlBuilderInterface
     */
    private UrlBuilderInterface $urlBuilder;

    public function __construct(\App\Catalog\Block\CategoryList $categoryListBlock, UrlBuilderInterface $urlBuilder)
    {
        $this->categoryListBlock = $categoryListBlock;
        $this->urlBuilder = $urlBuilder;
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
        $urlBuilder = $this->urlBuilder;
        if (empty($this->getTemplate())) {
            return include BP.'/App/Core/view/templates/page.phtml';
        }

        return include BP . $this->getTemplate();
    }
}
