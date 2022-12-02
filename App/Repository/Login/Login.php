<?php

namespace App\Repository\Login;

use App\Repository\Repository;

class Login
{

    use Repository;

    public function getLogin()
    {
        $db = $this->connection;
        return $db->get('login');
    }

    public function updateBlock($dateBlock)
    {
        $db = $this->connection;
        $data = array(
            'data_block_login' => $dateBlock,
        );
        $db->where('id_login', 1);
        $db->update('login', $data);
    }

    public function updateStatus($status)
    {
        $db = $this->connection;
        $data = array(
            'status_user_login' => $status,
        );
        $db->where('id_login', 1);
        $db->update('login', $data);
    }

    public function updateErroLogin($error)
    {
        $db = $this->connection;
        $data = array(
            'userqtdfail_login' => $error,
        );
        $db->where('id_login', 1);
        $db->update('login', $data);
    }
}
