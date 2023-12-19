<?php

namespace App\Models;

use CodeIgniter\Model;

class Booking extends Model
{
    protected $table      = 'booking';
    protected $primaryKey = 'booking_id';
    // protected $allowedFields = ['honorifics', 'first_name', 'last_name', 'id_number', 'flight_id', 'quantity', 'seat'];

    public function addBooking($booking_id, $username, $price, $flight_id)
    {
        $db = \Config\Database::connect();
        $query = $db->query('INSERT INTO booking (booking_id, username, price, flight_id) VALUES (?, ?, ?, ?)', [$booking_id, $username, $price, $flight_id]);
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

    public function ticketSale()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT MONTH(created_at) AS MONTH, flight_id, SUM(price * 5 / 6) AS revenue FROM booking WHERE status = 'Success' GROUP BY MONTH, flight_id ORDER BY MONTH");
        return $query->getResult();
    }

    public function getStatus($booking_id)
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT status FROM booking WHERE booking_id = ?', [$booking_id]);
        return $query->getResult();
    }
}