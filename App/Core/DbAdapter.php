<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox shop
 * @copyright   Copyright (c) 2019 MjFox Inc. (http://www.mjfox.com)
 * @license     http://wiki.mjfox.com/wiki/EULA  End-user License Agreement
 */

namespace App\Core;

class DbAdapter
{
    public const ENV_FIELD_DB_HOST = 'DB_HOST';
    public const ENV_FIELD_DB_NAME = 'DB_NAME';
    public const ENV_FIELD_DB_USER_LOGIN = 'DB_USER_LOGIN';
    public const ENV_FIELD_DB_USER_PASS = 'DB_USER_PASS';

    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * DbAdapter constructor.
     *
     * @param DotEnv $dotEnv
     */
    public function __construct(\App\Core\DotEnv $dotEnv)
    {
        $host = $dotEnv->getValue(self::ENV_FIELD_DB_HOST);
        $dbName = $dotEnv->getValue(self::ENV_FIELD_DB_NAME);

        $this->pdo = new \PDO(
            "mysql:host={$host};dbname={$dbName}",
            $dotEnv->getValue(self::ENV_FIELD_DB_USER_LOGIN),
            $dotEnv->getValue(self::ENV_FIELD_DB_USER_PASS),
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]
        );
    }

    /**
     * @param $string
     * @return string
     */
    public function quote($string)
    {
        return $this->pdo->quote($string);
    }

    /**
     * @param string $sql
     * @return false|\PDOStatement
     */
    public function query(string $sql)
    {
        return $this->pdo->query($sql);
    }

    /**
     * @param string $sql
     * @return array
     */
    public function select(string $sql) : array
    {
        $stmt = $this->pdo->query($sql);

        if ($stmt) {
            try {
                $result = $stmt->fetchAll();
            } catch (\Exception $e) {
                echo $e->getMessage();
                $result = [];
            }

            return $result;
        }

        return [];
    }

    /**
     * @param string $sql
     * @return array | bool
     */
    public function selectRow(string $sql)
    {
        $stmt = $this->pdo->query($sql);

        if ($stmt) {
            try {
                $result = $stmt->fetch();
            } catch (\Exception $e) {
                echo $e->getMessage();
                $result = [];
            }

            return $result;
        }

        return [];
    }
}
