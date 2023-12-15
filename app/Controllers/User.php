<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->findAll();
        dd($users);

        $data = [
            'title' => 'Daftar User',
            'user' => $users
        ];

        echo view('pages/search');
    }
}
