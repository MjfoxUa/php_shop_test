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

namespace App\Catalog\Controller\Category;

class Add implements \App\Catalog\Controller\ActionInterface
{

    /**
     * @var \App\Core\Block\Page
     */
    private $page;
    /**
     * @var \App\Catalog\Model\CategoryFactory
     */
    private $categoryFactory;
    /**
     * @var \App\Catalog\Block\CategoryEdit
     */
    private $categoryEdit;

    public function __construct(\App\Core\Block\Page $page,
                                \App\Catalog\Model\CategoryFactory $categoryFactory,
                                \App\Catalog\Block\CategoryEdit $categoryEdit)
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
