<?php

namespace App\Models;

use CodeIgniter\Model;

class Pnr extends Model
{
    protected $table      = 'Pnr';
    // protected $allowedFields = ['honorifics', 'first_name', 'last_name', 'id_number', 'flight_id', 'quantity', 'seat'];

    public function addPnr($booking_id, $honorifics, $first_name, $last_name, $id_number, $flight_id, $quantity)
    {
        $db = \Config\Database::connect();
        $query = $db->query('INSERT INTO pnr (booking_id, honorifics, first_name, last_name, id_number, flight_id, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)', [$booking_id, $honorifics, $first_name, $last_name, $id_number, $flight_id, $quantity]);
        return $query;
    }

    public function getPnr()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM pnr');
        return $query->getResult();
    }
}