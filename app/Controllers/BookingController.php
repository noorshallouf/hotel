<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\BookingRoomModel;
use App\Models\RoomModel;

class BookingController extends BaseController
{
    public function create()
    {
        // 1. حماية (لازم يكون مسجّل دخول)
        if (! session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $roomId    = $this->request->getPost('room_id');
        $checkIn   = $this->request->getPost('check_in');
        $checkOut  = $this->request->getPost('check_out');

        // 2. Validation بسيط
        if (! $roomId || ! $checkIn || ! $checkOut) {
            return redirect()->back()->with('error', 'البيانات غير مكتملة');
        }

        // 3. التأكد من التوفر
        if (! $this->isAvailable($roomId, $checkIn, $checkOut)) {
            return redirect()->back()->with('error', 'الغرفة غير متوفرة في هذا التاريخ');
        }

        // 4. حساب السعر
        $roomModel = new RoomModel();
        $room      = $roomModel->find($roomId);

        $days = max(1, (strtotime($checkOut) - strtotime($checkIn)) / 86400);
        $totalPrice = $days * $room['price_per_night'];

        // 5. تخزين الحجز
        $bookingModel = new BookingModel();
        $bookingId = $bookingModel->insert([
            'user_id'     => session()->get('user_id'),
            'check_in'    => $checkIn,
            'check_out'   => $checkOut,
            'total_price' => $totalPrice,
            'status'      => 'pending',
        ]);

        // 6. ربط الحجز بالغرفة
        $bookingRoomModel = new BookingRoomModel();
        $bookingRoomModel->insert([
            'booking_id' => $bookingId,
            'room_id'    => $roomId,
        ]);

        return redirect()->to('/booking/success');
    }

    // 🔴 أهم دالة في المشروع
    private function isAvailable($roomId, $checkIn, $checkOut)
    {
        $bookingRoomModel = new BookingRoomModel();

        $conflict = $bookingRoomModel
            ->select('booking_rooms.id')
            ->join('bookings', 'bookings.id = booking_rooms.booking_id')
            ->where('booking_rooms.room_id', $roomId)
            ->groupStart()
            ->where('bookings.check_in <', $checkOut)
            ->where('bookings.check_out >', $checkIn)
            ->groupEnd()
            ->first();

        return $conflict ? false : true;
    }
    public function success()
    {
        return view('booking_success');
    }
}
