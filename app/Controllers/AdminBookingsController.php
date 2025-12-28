<?php

namespace App\Controllers;

use App\Models\BookingModel;

class AdminBookingsController extends BaseAdminController
{
    public function index()
    {
        $this->checkAdmin();

        $bookingModel = new BookingModel();

        $data['bookings'] = $bookingModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('dashboard/bookings', $data);
    }
}
