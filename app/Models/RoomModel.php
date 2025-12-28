<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'room_type_id',
        'room_number',
        'title',
        'description',
        'price_per_night',
        'image',
        'status'
    ];
    public function getAvailableRooms($checkIn, $checkOut, $adults, $children)
{
    return $this->db->table('rooms')
        ->select('rooms.*')
        ->join('room_types', 'room_types.id = rooms.room_type_id')
        ->where('room_types.max_adults >=', $adults)
        ->where('room_types.max_children >=', $children)
        ->where('rooms.status', 'available')
        ->whereNotIn('rooms.id', function ($builder) use ($checkIn, $checkOut) {
            return $builder->select('booking_rooms.room_id')
                ->from('booking_rooms')
                ->join('bookings', 'bookings.id = booking_rooms.booking_id')
                ->where('bookings.status !=', 'cancelled')
                ->where('bookings.check_in <', $checkOut)
                ->where('bookings.check_out >', $checkIn);
        })
        ->get()
        ->getResult();
}

public function store()
{
    $roomModel = new RoomModel();

    $roomModel->insert([
        'room_number' => $this->request->getPost('room_number'),
        'title' => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'price_per_night' => $this->request->getPost('price_per_night'),
        'status' => $this->request->getPost('status'),
    ]);

    return redirect()->to('/dashboard/rooms')->with('success', 'Room added successfully');
}
}

