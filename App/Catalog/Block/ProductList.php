<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Block;

class ProductList
{
    public function render()
    {
      echo '123444';
    }

    public function toHtml()
    {
        ob_start();
        include 'template1.php';
        $a = ob_get_contents();
        ob_clean();
        return $a;
    }
}
