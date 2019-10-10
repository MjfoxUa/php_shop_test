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

class Save
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
        $errors = [];
        if(!$_POST['name']){
            $errors[] = 'No category! <br>';
        }
        if(!$_POST['url']){
            $errors[] = 'No path! <br>';
        }

        if(!empty($errors)){
            echo json_encode(['errors' => $errors, 'status' => false] );
            return;
        }
        $category = $this->categoryFactory->create();
        $category->save($_POST);
        echo  json_encode(['status' => true, 'message' => 'Category saved'] );
    }
}
