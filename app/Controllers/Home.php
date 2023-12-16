<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('layout/header', $data).view('pages/home').view('layout/footer');
    }
}