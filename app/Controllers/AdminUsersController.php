<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminUsersController extends BaseAdminController
{
    public function index()
    {
        $this->checkAdmin();

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('dashboard/users', $data);
    }
}
