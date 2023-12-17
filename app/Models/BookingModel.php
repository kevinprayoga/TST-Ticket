<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table      = 'booking';
    protected $primaryKey = 'pnr';
    protected $allowedFields = ['booking_id','honorifics', 'first_name', 'last_name', 'id_number', 'flight_id', 'quantity', 'seat'];
}