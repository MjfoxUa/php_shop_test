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

namespace App\Catalog\Controller\Category;

class Delete implements \App\Catalog\Controller\ActionInterface
{

    /**
     * @var \App\Catalog\Model\CategoryFactory
     */
    private $categoryFactory;

    public function __construct(\App\Catalog\Model\CategoryFactory $categoryFactory)
    {

        $this->categoryFactory = $categoryFactory;
    }

    public function execute()
    {
            $categorys = $this->categoryFactory->create();
            $categorys->load($_POST['category']);
            $categorys->categoryDelete();
            echo  json_encode([ 'message' => 'Category was deleted!', 'status' => true]);
    }
}
