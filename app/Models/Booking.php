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

    public function getPriceAPI()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT SUM(price) AS total_price, MONTH(created_at) AS month FROM booking GROUP BY MONTH(created_at)');
        return $query->getResult();
    }

    public function getStatus($booking_id)
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT status FROM booking WHERE booking_id = ?', [$booking_id]);
        return $query->getResult();
    }
}