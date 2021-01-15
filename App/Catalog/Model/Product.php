<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2021 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Model;

class Product
{
    private $name;
    private $sku;
    private $price;
    private $image;
    private $category;
    private $description;
    private $createAt;
    private $updateAt;
    private $id;
    private $category_name;

    /**
     * @var \App\Core\DbAdapter
     */
    private $dbAdapter;

    public function __construct(\App\Core\DbAdapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function load($id)
    {
        $productData =  $this->dbAdapter->selectRow("SELECT products.*, category.name AS category_name 
                                                     FROM products LEFT JOIN category 
                                                     ON products.category=category.id  WHERE  products.`id`='$id'");
        $this->setId($productData['id']);
        $this->setName($productData['name']);
        $this->setSku($productData['sku']);
        $this->setPrice($productData['price']);
        $this->setImage($productData['image']);
        $this->setCategory($productData['category']);
        $this->setDescription($productData['description']);
        $this->setCreateAt($productData['create_at']);
        $this->setUpdateAt($productData['update_at']);
        $this->setCategoryName($productData['category_name']);
    }


    public function lastId($array)
    {
        if(!$array['id']){
            return $this->dbAdapter->getDriver()->lastInsertId();
        }
        return $this->getId();
    }

    public function setData(array $array)
    {
        if ($array['id']) {
            $this->setId($array['id']);
        }
        $this->setName($array['name']);
        $this->setCategory($array['category']);
        $this->setSku($array['sku']);
        $this->setPrice($array['price']);
        $this->setDescription($array['description']);

    }

    public function save()
    {
        if($this->id){
            if(!empty($this->image)){
                $imageChange = "image=" . $this->dbAdapter->quote($this->image) . ",";
            } else {
                $imageChange = null;
            }
            $result =  $this->dbAdapter->query("UPDATE `products` SET `category`='$this->category',".
                "`name`='$this->name',`sku`='$this->sku',`price`='$this->price',$imageChange".
                "`description`='$this->description' WHERE `id`= '$this->id'"
            );
        } else{

            $result =  $this->dbAdapter->query(
                "INSERT INTO `products` (`id`, `category`, `name`, `sku`, `price`, `image`, `description`)".
                " VALUES (NULL, '$this->category', '$this->name', '$this->sku','$this->price', '$this->image', '$this->description');"
            );
        }
        return $result;
    }

    public function imageLoad()
    {
        if (file_exists($_FILES['image']['name']) !== true) {
            return move_uploaded_file($_FILES['image']['tmp_name'], 'uploaded/'.$_FILES['image']['name']);
        }else{
                return "Error uploading files";
        }
    }

    public function deleteProduct()
    {
        $id = $this->getId();
        if(file_exists('uploaded/'.$this->getImage())){
            unlink('uploaded/'.$this->getImage());
        }
        $result = $this->dbAdapter->query("DELETE FROM `products` WHERE `id`= '$id'");
        return $result;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getImage(){
        return $this->image;
    }

    /**
     * @param mixed $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param $sku
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param $create_at
     * @return $this
     */
    public function setCreateAt($create_at)
    {
        $this->createAt = $create_at;
        return $this;
    }

    /**
     * @param $update_at
     * @return $this
     */
    public function setUpdateAt($update_at)
    {
        $this->updateAt = $update_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * @param mixed $category_name
     */
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
    }
}
