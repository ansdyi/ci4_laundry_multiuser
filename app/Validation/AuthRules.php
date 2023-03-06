<?php

namespace App\Validation;

use App\Models\PenggunaModel;

class AuthRules
{
    function __construct()
    {
        $this->pengguna = new PenggunaModel();
    }

    public function validateUser(string $str, string $fields, array $data)
    {
        $user = $this->pengguna->where('username', $data['username'])->first();

        if (!$user) {
            return false;
        }

        return password_verify($data['password'], $user['password']);
    }
}
