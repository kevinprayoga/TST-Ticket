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
        $data = [
            'title' => 'Login User',
            'user' => $this->userModel->findAll()
        ];

        return view('pages/login');
    }

    public function checkCredentials()
    {
        // $this->request->getVar()
    }
}
