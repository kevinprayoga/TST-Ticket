<?php
namespace App\Controllers;
use App\Models\Login;
class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function loginProcess()
    {
        $model = model(Login::class);
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $model->getDataUsers($username, $password);
        if ($cek > 0) {
            session()->set('username', $username);
            // var_dump(session()->get());
            return redirect()->to('/');
        } else {
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}