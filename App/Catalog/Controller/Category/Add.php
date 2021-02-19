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

namespace App\Catalog\Controller\Category;

use App\Catalog\Block\CategoryEdit;
use App\Catalog\Controller\ActionInterface;
use App\Catalog\Model\CategoryFactory;
use App\Core\Block\Page;

class Add implements ActionInterface
{

    /**
     * @var Page
     */
    private $page;

    /**
     * @var CategoryFactory
     */
    private $categoryFactory;

    /**
     * @var CategoryEdit
     */
    private $categoryEdit;

    /**
     * Add constructor.
     *
     * @param \App\Core\Block\Page               $page
     * @param \App\Catalog\Model\CategoryFactory $categoryFactory
     * @param \App\Catalog\Block\CategoryEdit    $categoryEdit
     */
    public function __construct(
        Page $page,
        CategoryFactory $categoryFactory,
        CategoryEdit $categoryEdit)
    {

        $this->page = $page;
        $this->categoryFactory = $categoryFactory;
        $this->categoryEdit = $categoryEdit;
    }

    public function execute()
    {
        $this->page->setTitle('Category add');
        $category = $this->categoryFactory->create();
        $this->categoryEdit->getCategorys();
        $this->page->setMainContentBlock($this->categoryEdit);
        $this->page->render();

    }
}
