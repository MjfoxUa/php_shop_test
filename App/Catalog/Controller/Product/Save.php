<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Controller\Product;

class Save
{
    private $name;
    private $category;
    private $sku;
    private $price;
    private $description;

    private $fileTmpDirectory;
    private $uploadFileName;

    private $dbAdapter;

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

    public function execute()
    {
        if (file_exists($this->uploadFileName) !== true) {
            if (move_uploaded_file($this->fileTmpDirectory, 'uploaded')) {
                echo "Файли загружено\n";
            }
        }else{
            echo  "Помилка при загрузці файлів\n";
        }
       $result =  $this->dbAdapter->query("INSERT INTO `products` (`id`, `category`, `name`, `sku`, `price`, `image`, `description`) VALUES (NULL, '$this->category', '$this->name', '$this->sku', '$this->uploadFileName', '$this->price', '$this->description');");

        return $result;
    }
}

