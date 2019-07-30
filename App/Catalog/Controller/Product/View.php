<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Controller\Product;

class View
{

    /**
     * @var \App\Core\Block\Page
     */
    private $page;

    public function __construct(\App\Core\Block\Page $page)
    {

        $this->page = $page;
    }

    public function execute()
    {
        $this->page->setTitle('Product');

        $this->page->render();
    }
}
