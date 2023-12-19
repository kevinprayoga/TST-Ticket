<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Booking;

class BookingAPI extends ResourceController
{
    public function index()
    {
        $model = model(Booking::class);
        $result = $model->getPriceAPI();
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