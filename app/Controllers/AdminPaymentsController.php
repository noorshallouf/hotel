<?php

namespace App\Controllers;

use App\Models\PaymentModel;

class AdminPaymentsController extends BaseAdminController
{
    public function index()
    {
        $this->checkAdmin();

        $paymentModel = new PaymentModel();
        $data['payments'] = $paymentModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('dashboard/payments', $data);
    }
}
