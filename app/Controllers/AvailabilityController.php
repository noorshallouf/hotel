<?php

namespace App\Controllers;

use App\Models\RoomModel;

class AvailabilityController extends BaseController
{
    public function check()
    {
        $checkIn  = $this->request->getGet('check_in');
        $checkOut = $this->request->getGet('check_out');
        $adults   = (int) $this->request->getGet('adults');
        $children = (int) $this->request->getGet('children');

        // Validation بسيط (أساسي)
        if (!$checkIn || !$checkOut || $adults <= 0) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid input'
            ])->setStatusCode(400);
        }

        $roomModel = new RoomModel();

        $rooms = $roomModel->getAvailableRooms(
            $checkIn,
            $checkOut,
            $adults,
            $children
        );

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $rooms
        ]);
    }
}
