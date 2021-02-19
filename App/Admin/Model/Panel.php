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

namespace App\Admin\Model;

class Panel
{
    public function switchPage($menuRequest)
    {
        switch ($menuRequest) {
            case '':
                $this->page->setMainContentBlock($this->categoryEdit);
                break;
            case 'index':
                $this->page->setMainContentBlock($this->categoryEdit);
                break;
            case 'category':
                $this->page->setMainContentBlock($this->categoryEdit);
                break;
            default:
                $this->page->setMainContentBlock($this->productEdit);
                break;
        }
    }
}
