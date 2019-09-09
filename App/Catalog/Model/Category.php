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
    private function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    private function setUrl($url)
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
    private function setCategoryCount(int $param)
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
    private function setCategorys(array $categorys)
    {
        $this->categorys = $categorys;
        return $this;
    }

    public function getCategorys()
    {
        return $this->categorys;
    }
}
