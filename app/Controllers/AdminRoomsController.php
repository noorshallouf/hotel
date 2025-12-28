<?php

namespace App\Controllers;

use App\Models\RoomModel;

class AdminRoomsController extends BaseAdminController
{
    public function index()
{
    $model = new \App\Models\RoomModel();

    $rooms = $model->findAll();

    return view('dashboard/rooms/index', [
        'rooms' => $rooms
    ]);
}


    public function create()
    {
        return view('dashboard/rooms/index', [
            'page' => 'create',
            'rooms' => []
        ]);
    }

    public function store()
    {
        $model = new RoomModel();

        $model->insert([
            'room_number' => $this->request->getPost('room_number'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'price_per_night' => $this->request->getPost('price_per_night'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/dashboard/rooms');
    }
}
