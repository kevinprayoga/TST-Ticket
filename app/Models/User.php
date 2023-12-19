<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function loginProcess($username, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM user WHERE username=? AND password=?", [$username, $password]);
        return count($query->getResult());
    }
}