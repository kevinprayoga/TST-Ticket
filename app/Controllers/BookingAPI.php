<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Booking;

class BookingAPI extends ResourceController
{
    public function index()
    {
        $model = model(Booking::class);
        $result = $model->ticketSales();
        if ($result) {
            $data = [
                'message' => 'success',
                'sales' => $result
            ];
        } else {
            $data = [
                'message' => 'failed',
                'sales' => []
            ];
        }
        return $this->respond($data, 200);
    }
}