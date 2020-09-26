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

namespace App\Catalog\Controller\Product;

class Save implements \App\Catalog\Controller\ActionInterface
{
    /**
     * @var \App\Catalog\Model\Product
     */
    private $product;
    /**
     * @var \App\Core\Block\Page
     */
    private $page;
    /**
     * @var \App\Core\DbAdapter
     */
    private $dbAdapter;
    /**
     * @var \App\Catalog\Model\ProductFactory
     */
    private $productFactory;


    public function __construct(
        \App\Core\Block\Page $page,
        \App\Catalog\Model\Product $product,
        \App\Catalog\Model\ProductFactory $productFactory,
        \App\Core\DbAdapter $dbAdapter
        )
    {

        $this->product = $product;
        $this->page = $page;
        $this->dbAdapter = $dbAdapter;
        $this->productFactory = $productFactory;
    }

    public function execute()
    {
        $errors = [];

        if(!$_POST['name']){
            $errors[] = 'No name! <br>';
        }
        if(!$_POST['category']){
            $errors[] = 'No category <br>!';
        }
        if(!$_POST['sku']){
            $errors[] = 'No sku! <br>';
        }
        if(!$_POST['price']){
            $errors[] = 'No price! <br>';
        }
        if(!$_POST['description']){
            $errors[] = 'No description! <br>';
        }
        if(!$_POST['id']){
            if(!$_FILES['image']['name']){
            $errors[] = 'No image! <br>';
            }
        }
        if(!empty($errors)){
            echo json_encode(['errors' => $errors, 'status' => false] );
            return;
        }
        $product = $this->productFactory->create();
        $product->setData($_POST);
        $product->setImage($_FILES['image']['name']);
        $product->imageLoad();
        $product->save();
        $id = $product->lastId($_POST);

        echo  json_encode(['status' => true, 'message' => 'Product saved', 'id' => $id ] );
    }
}
