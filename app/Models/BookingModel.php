<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table      = 'booking';
    protected $primaryKey = 'pnr';
    protected $allowedFields = ['honorifics', 'first_name', 'last_name', 'id_number', 'flight_id'];
}