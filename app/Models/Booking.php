<?php

namespace App\Models;

use CodeIgniter\Model;

class Booking extends Model
{
    protected $table      = 'booking';
    protected $primaryKey = 'booking_id';
    // protected $allowedFields = ['honorifics', 'first_name', 'last_name', 'id_number', 'flight_id', 'quantity', 'seat'];

    public function addBooking($booking_id, $username, $price)
    {
        $db = \Config\Database::connect();
        $query = $db->query('INSERT INTO booking (booking_id, username, price) VALUES (?, ?, ?)', [$booking_id, $username, $price]);
        return $query;
    }

    public function updateBooking($booking_id, $status)
    {
        $db = \Config\Database::connect();
        $query = $db->query('UPDATE booking SET status = ? WHERE booking_id = ?', [$status, $booking_id]);
        return $query;
    }

    public function getBooking($username)
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM booking WHERE username = ?', [$username]);
        return $query->getResult();
    }
}