<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        echo view("layout/header");
        echo view("pages/home");
        echo view("layout/footer");
    }

    public function login()
    {
        echo view("layout/header");
        echo view("pages/login");
        echo view("layout/footer");
    }

    public function search()
    {
        echo view("layout/header");
        echo view("pages/search");
        echo view("layout/footer");
    }

    public function history()
    {
        echo view("layout/header");
        echo view("pages/history");
        echo view("layout/footer");
    }
}
