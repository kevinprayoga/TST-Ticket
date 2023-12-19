<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
    protected $table      = 'username';

    public function getDataUsers($username, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM user WHERE username = ? AND password = ?', [$username, $password]);
        return $query->getResult();
    }
}