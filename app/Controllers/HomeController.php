<?php

namespace App\Controllers;
use App\Models\UserModel;
class HomeController extends BaseController
{
  

public function index()
{
    $userModel = new UserModel();
    $users = $userModel->findAll();

    return $this->response->setJSON($users);
}

}
