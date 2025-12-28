<?php

namespace App\Controllers;

use App\Models\PaymentModel;
use App\Models\BookingModel;

class PaymentController extends BaseController
{
    public function pay($bookingId)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $bookingModel = new BookingModel();
        $booking = $bookingModel->find($bookingId);

        if (! $booking) {
            return redirect()->to('/dashboard')->with('error', 'الحجز غير موجود');
        }

        // Fake payment (نجاح مباشر)
        $paymentModel = new PaymentModel();
        $paymentModel->insert([
            'booking_id' => $bookingId,
            'amount'     => $booking['total_price'],
            'method'     => 'cash',
            'status'     => 'paid',
        ]);

        // تحديث حالة الحجز
        $bookingModel->update($bookingId, [
            'status' => 'confirmed'
        ]);

        return redirect()->to('/dashboard')->with('success', 'تم الدفع بنجاح');
    }
}
