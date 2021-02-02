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
use App\Catalog\Block\ProductEdit;
use App\Catalog\Controller\ActionInterface;
use App\Core\Block\Page;
use App\Core\Request;

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
    private Request $request;
    private ProductEdit $productEdit;

    /**
     * @param \App\Core\Block\Page $page
     * @param \App\Catalog\Block\CategoryEdit $categoryEdit
     * @param \App\Core\Request $request
     * @param \App\Catalog\Block\ProductEdit $productEdit
     */
    public function __construct(
        Page $page,
        CategoryEdit $categoryEdit,
        Request $request,
        ProductEdit $productEdit
    ) {
        $this->page = $page;
        $this->categoryEdit = $categoryEdit;
        $this->request = $request;
        $this->productEdit = $productEdit;
    }

    public function execute()
    {
        $this->page->setTitle('Admin Panel');
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $page = '/App/Admin/view/templates/';
        if (!isset($_SESSION['loggedin'])) {
            $page .= INVALID;
        } else {
            $page .= LOGEDIN;
            $menuRequest = $this->request->getSingleActionParat();
            $this->page->setMainContentBlock($this->categoryEdit);

            switch ($menuRequest) {
                case 'index':
                case 'category':
                case '':
                    $this->page->setMainContentBlock($this->categoryEdit);
                    break;
                default:
                    $this->page->setMainContentBlock($this->productEdit);
                    break;
            }
        }

        $this->page->setTemplate($page);
        $this->page->render();
    }
}
