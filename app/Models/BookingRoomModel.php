<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingRoomModel extends Model
{
    protected $table = 'booking_rooms';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'booking_id',
        'room_id',
        'price_per_night'
    ];
}
