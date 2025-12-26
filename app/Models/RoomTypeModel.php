<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomTypeModel extends Model
{
    protected $table = 'room_types';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'description',
        'max_adults',
        'max_children'
    ];
}
