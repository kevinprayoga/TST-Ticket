<?php

namespace App\Models;

use CodeIgniter\Model;

class Booking extends Model
{
    protected $table      = 'booking';
    protected $primaryKey = 'booking_id';
    // protected $allowedFields = ['honorifics', 'first_name', 'last_name', 'id_number', 'flight_id', 'quantity', 'seat'];

    public function addBooking($booking_id, $username)
    {
        $db = \Config\Database::connect();
        $query = $db->query('INSERT INTO booking (booking_id, username) VALUES (?, ?)', [$booking_id, $username]);
        return $query;
    }

    public function getBooking()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM booking');
        return $query->getResult();
    }
}