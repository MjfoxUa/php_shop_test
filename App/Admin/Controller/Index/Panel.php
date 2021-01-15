<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

namespace App\Admin\Controller\Index;

use App\Catalog\Controller\ActionInterface;

class Panel implements ActionInterface
{
    /**
     * @var \App\Core\Block\Page
     */
    private \App\Core\Block\Page $page;

    public function __construct(
        \App\Core\Block\Page $page
    ) {
        $this->page = $page;
    }

    public function execute()
    {
        $this->page->setTitle('Admin Panel');
        echo 'YES!';
    }
}
