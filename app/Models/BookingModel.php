<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'check_in',
        'check_out',
        'adults',
        'children',
        'total_price',
        'status'
    ];

    protected $useTimestamps = true;
}
