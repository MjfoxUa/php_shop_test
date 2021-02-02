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
use App\Core\Block\Page;

class View implements ActionInterface
{
    /**
     * @var Page
     */
    private Page $page;
    /**
     * @var Panel
     */
    private Panel $adminPanel;

    /**
     * @param \App\Core\Block\Page $page
     * @param \App\Admin\Controller\Index\Panel $adminPanel
     */
    public function __construct(
        Page $page,
        Panel $adminPanel
    ) {
        $this->page = $page;
        $this->adminPanel = $adminPanel;
    }

    public function execute()
    {
        session_start();
        if (isset($_SESSION['loggedin'])) {
            $this->adminPanel->execute();
        }

        $this->page->setTitle('Admin Login');
        $this->page->setTemplate('/App/Admin/view/templates/admin.phtml');
        $this->page->render();
    }
}
