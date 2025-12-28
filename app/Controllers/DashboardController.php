<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoomModel;
use App\Models\BookingModel;
use App\Models\PaymentModel;

class DashboardController extends BaseAdminController
{
    public function index()
    {
        $this->checkAdmin();

        $userModel    = new UserModel();
        $roomModel    = new RoomModel();
        $bookingModel = new BookingModel();
        $paymentModel = new PaymentModel();

        $data = [
            'users_count'    => $userModel->countAll(),
            'rooms_count'    => $roomModel->countAll(),
            'bookings_count' => $bookingModel->countAll(),
            'total_revenue'  => $paymentModel
                                    ->selectSum('amount')
                                    ->first()['amount'] ?? 0,

            'latest_bookings' => $bookingModel
                                    ->orderBy('created_at', 'DESC')
                                    ->findAll(5)
        ];

        return view('dashboard/index', $data);
    }
}
