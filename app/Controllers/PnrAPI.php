<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Pnr;

class PnrAPI extends ResourceController
{
    public function index()
    {
        $model = model(Pnr::class);
        $result = $model->getPnr();
        if ($result) {
            $data = [
                'message' => 'success',
                'pnr' => $result
            ];
        } else {
            $data = [
                'message' => 'failed',
                'pnr' => []
            ];
        }
        return $this->respond($data, 200);
    }
}