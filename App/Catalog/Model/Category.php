<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Catalog\Model;

class Category
{
    private $name;
    private $url;
    private $categoryCount;
    private $categorys;


    public function __construct(\App\Core\DbAdapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * @param $id
     */
    public function load($id)
    {
        $categoryData =  $this->dbAdapter->selectRow("SELECT * FROM `category` WHERE `id`='$id'");
        $this->setName($categoryData['name']);
        $this->setUrl($categoryData['url']);
    }

    public function loadCategorys()
    {
        $categorys = $this->dbAdapter->select("SELECT * FROM `category`");
        $this->setCategorys($categorys);
    }


    public function categoryCount()
    {
        $categoryDataCount = $this->dbAdapter->select("SELECT * FROM `category`");
        $this->setCategoryCount($categoryCount = count($categoryDataCount));
    }
    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function getCaregoryUrl()
    {
        return '/shop/catalog/category/view/'.$this->getUrl();
    }
    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param int $param
     * @return $this
     */
    public function setCategoryCount(int $param)
    {
        $this->categoryCount = $param;
        return $this;
    }

    public function getCategoryCount()
    {
        return $this->categoryCount;
    }

    /**
     * @param array $categorys
     * @return $this
     */
    public function setCategorys(array $categorys)
    {
        $this->categorys = $categorys;
        return $this;
    }

    public function getCategorys()
    {
        return $this->categorys;
    }
}
