<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PenggunaModel;


class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new PenggunaModel();

        $user_object->insertBatch([
            [
                "nama_pengguna" => "Hwang Hyunjin",
                "username" => "hhj2000",
                "password" => password_hash("hhj2000", PASSWORD_DEFAULT),
                "id_outlet" => "2",
                "role" => "kasir",
            ]
        ]);
    }
}
