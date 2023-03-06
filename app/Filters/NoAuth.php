<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLoggedIn')) {

            if (session()->get('role') == "Admin") {
                return redirect()->to(base_url('admin'));
            }

            if (session()->get('role') == "Kasir") {
                return redirect()->to(base_url('kasir'));
            }

            if (session()->get('role') == "Owner") {
                return redirect()->to(base_url('owner'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
