<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsletterSubscriberModel extends Model
{
    protected $table = 'newsletter_subscribers';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'email'
    ];
}
