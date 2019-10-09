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
