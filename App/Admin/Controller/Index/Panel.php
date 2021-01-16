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

use App\Catalog\Block\CategoryEdit;
use App\Catalog\Controller\ActionInterface;
use App\Core\Block\Page;

const LOGEDIN = 'panel.phtml';
const INVALID = 'admin.phtml';

class Panel implements ActionInterface
{
    /**
     * @var Page
     */
    private Page $page;

    /**
     * @var CategoryEdit
     */
    private CategoryEdit $categoryEdit;

    /**
     * @param \App\Core\Block\Page $page
     * @param \App\Catalog\Block\CategoryEdit $categoryEdit
     */
    public function __construct(
        Page $page,
        CategoryEdit $categoryEdit
    ) {
        $this->page = $page;
        $this->categoryEdit = $categoryEdit;
    }

    public function execute()
    {
        $this->page->setTitle('Admin Panel');
        session_start();
        $page = '/App/Admin/view/templates/';
        if (!isset($_SESSION['loggedin'])) {
            $page .= INVALID;
        } else {
            $this->page->setMainContentBlock($this->categoryEdit);
            $page .= LOGEDIN;
        }

        $this->page->setTemplate($page);
        $this->page->render();
    }
}
