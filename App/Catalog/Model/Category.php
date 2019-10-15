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
    private $id;

    /**
     * @var \App\Core\DbAdapter
     */
    private $dbAdapter;

    public function __construct(\App\Core\DbAdapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * @param        $id
     * @param string $field
     * @return $this
     */
    public function load($id, $field = 'id')
    {
        $categoryData =  $this->dbAdapter->selectRow("SELECT * FROM `category` WHERE `$field`='$id'");
        $this->setName($categoryData['name']);
        $this->setUrl($categoryData['url']);
        $this->setId($categoryData['id']);
        return $this;
    }

    public function save(array $array)
    {
        $categoryName = $array['name'];
        $categoryUrl = $array['url'];
        $stmt = $this->dbAdapter->getDriver()->prepare(
            'INSERT INTO `category` (`id`, `name`, `url`) VALUES (null, :name, :url )'
        );
        $stmt->execute([':name' => $categoryName, ':url' => $categoryUrl ]);
        return $this;
    }

    public function categoryDelete()
    {
        $result = $this->dbAdapter->query("DELETE FROM `category` WHERE `id`= '$this->id'");
        return $result;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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

    public function getCategoryUrl()
    {
        return '/shop/catalog/category/view/url/'.$this->getUrl();
    }
    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

}
