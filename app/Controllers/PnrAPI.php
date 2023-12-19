<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Pnr;

class PnrAPI extends ResourceController
{
    public function index()
    {
        $model = model(Pnr::class);
        $booking_id = $this->request->getVar('booking_id');
        $last_name = $this->request->getVar('last_name');
        $result = $model->getPnr($booking_id, $last_name);
        if ($result) {
            $data = [
                'message' => 'success',
                'data' => $result
            ];
        } else {
            $data = [
                'message' => 'unavailable',
            ];
        }
        return $this->respond($data, 200);
    }
}