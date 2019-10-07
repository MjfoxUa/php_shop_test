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

namespace App\Catalog\Model;

class ProductSave
{
    private $name;
    private $category;
    private $sku;
    private $price;
    private $description;
    private $fileTmpDirectory;
    private $uploadFileName;
    private $dbAdapter;
    public $saveMessage;

    public function __construct(\App\Core\DbAdapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->name = $_POST['name'];
        $this->category = $_POST['category'];
        $this->sku = $_POST['sku'];
        $this->price = $_POST['price'];
        $this->description = $_POST['description'];
        $this->uploadFileName = $_FILES['image']['name'];
        $this->fileTmpDirectory = $_FILES['image']['tmp_name'];
    }

    public function load()
    {
        if (file_exists($this->uploadFileName) !== true) {
            if (move_uploaded_file($this->fileTmpDirectory, 'uploaded/'.$this->uploadFileName)) {
                $this->saveMessage = "Files uploaded";
            }
        }else{
            $this->saveMessage = "Error uploading files";
        }
        $result =  $this->dbAdapter->query(
            "INSERT INTO `products` (`id`, `category`, `name`, `sku`, `price`, `image`, `description`)".
            " VALUES (NULL, '$this->category', '$this->name', '$this->sku','$this->price', '$this->uploadFileName', '$this->description');"
        );

        return $result;
    }
}
