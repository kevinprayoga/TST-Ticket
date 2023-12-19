<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Booking;

class BookingAPI extends ResourceController
{
    public function index()
    {
        $model = model(Booking::class);
        $username = 'ilmagita';
        $result = $model->getBooking($username);
        if ($result) {
            $data = [
                'message' => 'success',
                'booking' => $result
            ];
        } else {
            $data = [
                'message' => 'failed',
                'booking' => []
            ];
        }
        return $this->respond($data, 200);
    }
}