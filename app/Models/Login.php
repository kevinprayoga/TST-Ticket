<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
    public function getDataUsers($username, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM user WHERE username = ? AND password = ?', [$username, $password]);
        return count($query->getResult());
    }
}