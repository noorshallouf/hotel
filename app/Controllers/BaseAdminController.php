<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class BaseAdminController extends Controller
{
    protected function checkAdmin()
    {
        if (! session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->send();
            exit;
        }
    }
}
