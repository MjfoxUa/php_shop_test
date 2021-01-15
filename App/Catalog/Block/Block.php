<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox SHOP
 * @copyright   Copyright (c) 2020 MjFox Inc.
 * @license     End-user License Agreement
 */

namespace App\Catalog\Block;

abstract class Block
{
    protected $templatePath;

    public function toHtml()
    {
        if ($this ->templatePath) {
            $block = $this;
            ob_start();
            include BP . $this ->templatePath;
            $a = ob_get_contents();
            ob_clean();
            return $a;
        }

        throw new \Exception('There is no such template' . get_class($this));
    }
}
