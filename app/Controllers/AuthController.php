<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    // عرض صفحة login
    public function login()
    {
        return view('auth/login');
    }

    // معالجة تسجيل الدخول
    public function storeLogin()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!$email || !$password) {
            return redirect()->back()->with('error', 'البيانات ناقصة');
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'بيانات الدخول غير صحيحة');
        }

        // ⭐ هذا أهم سطر في المشروع كله
        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'email'      => $user['email'],
            'role'       => $user['role'], // admin أو user
        ]);

        // تحويل حسب الدور
        if ($user['role'] === 'admin') {
            return redirect()->to('/dashboard');
        }

        return redirect()->to('/');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
