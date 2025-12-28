<?php

namespace App\Controllers;

use App\Models\RoomModel;

class HomeController extends BaseController
{
    public function index()
    {
        $roomModel = new RoomModel();

        // نجيب الغرف المتاحة فقط
        $rooms = $roomModel
            ->where('status', 'available')
            ->findAll(6); // نعرض 6 غرف في الصفحة الرئيسية

        return view('home', [
            'rooms' => $rooms
        ]);
    }

    // (قادم لاحقًا)
    public function room($id)
    {
        $roomModel = new RoomModel();

        $room = $roomModel->find($id);

        if (!$room) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Room not found');
        }

        return view('room_details', [
            'room' => $room
        ]);
    }
}
