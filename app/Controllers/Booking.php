<?php

namespace App\Controllers;

use App\Models\BookingModel;

class Booking extends BaseController
{
    protected $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
    }

    public function index()
    {
        $booking = $this->bookingModel->findAll();
        dd($booking);

        $data = [
            'title' => 'Daftar Booking',
            'booking' => $booking
        ];

        echo view('pages/search');
    }
}
