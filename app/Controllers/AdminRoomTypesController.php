<?php

namespace App\Controllers;

use App\Models\RoomTypeModel;

class AdminRoomTypesController extends BaseAdminController
{
    public function index()
    {
        $this->checkAdmin();

        $model = new RoomTypeModel();
        $data['roomTypes'] = $model->findAll();

        return view('dashboard/room_types', $data);
    }
}
