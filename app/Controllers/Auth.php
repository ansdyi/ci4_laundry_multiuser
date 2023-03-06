<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class Auth extends BaseController
{
    function __construct()
    {
        helper("form");
        $this->pengguna = new PenggunaModel();
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|min_length[5]|max_length[50]',
                'password' => 'required|min_length[5]|max_length[255]|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Username or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('v_login_auth', [
                    "validation" => $this->validator,
                ]);
            } else {
                $username = $this->request->getVar('username');

                $user = $this->pengguna->where('username', $username)->first();

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if ($user['role'] == "Admin") {
                    return redirect()->to(base_url('admin/dashboard'));
                } elseif ($user['role'] == "Kasir") {
                    return redirect()->to(base_url('kasir/dashboard'));
                } elseif ($user['role'] == "Owner") {
                    return redirect()->to(base_url('owner/dashboard'));
                }
            }
        }
        return view('v_login_auth');
    }

    private function setUserSession($user)
    {
        $data = [
            'id_user' => $user['id_user'],
            'nama_pengguna' => $user['nama_pengguna'],
            'username' => $user['username'],
            'password' => $user['password'],
            'id_outlet' => $user['id_outlet'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login');
    }
}
