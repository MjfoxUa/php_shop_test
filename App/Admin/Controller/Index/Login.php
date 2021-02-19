<?php
/**
 * MjFox Inc.
 * NOTICE OF LICENSE
 *
 * @package     MjFox_SHOP
 * @copyright   Copyright (c) 2021 MjFox Inc.
 * @license     End-user License Agreement
 */

namespace App\Admin\Controller\Index;

use App\Catalog\Controller\ActionInterface;
use App\Core\DbAdapter;

class Login implements ActionInterface
{
    /**
     * @var DbAdapter
     */
    private DbAdapter $dbAdapter;

    /**
     * Login constructor.
     *
     * @param \App\Core\DbAdapter $dbAdapter
     */
    public function __construct(
        DbAdapter $dbAdapter
    ) {
        $this->dbAdapter = $dbAdapter;
    }

    public function execute()
    {
        session_start();
        $user = $_POST['username'];
        $password = $_POST['password'];
        if ($this->verifyAccountData($user, $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $user;

            echo json_encode(['status' => true, 'message' => 'Welcome ' . $user . '!']);
            return ;
        }

        echo json_encode(['status' => false, 'message' => 'Invalid username or password.']);
    }

    /**
     * @param $user
     * @param $password
     * @return bool
     */
    private function verifyAccountData($user, $password): bool
    {
        if(empty($this->dbAdapter->select("SELECT * FROM `accounts` WHERE `username` ='$user'"))) {
            return false;
        }
        $userData = $this->dbAdapter->select("SELECT * FROM `accounts` WHERE `username` ='$user'");
        //TODO To implement multi-account

        return password_verify($password, $userData[0]['password']);
    }
}
