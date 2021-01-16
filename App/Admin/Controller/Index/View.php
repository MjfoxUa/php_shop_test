<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

declare(strict_types=1);

namespace App\Admin\Controller\Index;

use App\Catalog\Controller\ActionInterface;

class View implements ActionInterface
{
    /**
     * @var \App\Core\Block\Page
     */
    private \App\Core\Block\Page $page;

    public function __construct(\App\Core\Block\Page $page)
    {
        $this->page = $page;
    }

    public function execute()
    {
        $this->page->setTitle('Admin Login');
        $this->page->setTemplate('/App/Admin/view/templates/admin.phtml');
        $this->page->render();
    }
}
