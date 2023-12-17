<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class PaymentController extends ResourceController
{
    protected $modelName    = 'App\Models\PaymentModel';
    protected $format       = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'payment_data' => $this->model->findAll()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($payment_id = null)
    {
        $data = [
            'message' => 'success',
            'payment_data' => $this->model->find($payment_id)
        ];

        if ($data['payment_data'] == null) {
            return $this->failNotFound("Data pembayaran tidak ditemukan!");
        }

        return $this->respond($data, 200);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = $this->validate([
            'booking_id'=> 'required|alpha_numeric',
            'price'     => 'required|integer',
            'base_price'=> 'required|integer',
            'status'    => 'required|in_list[Success,Failed,Pending]'
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->insert([
            'booking_id'=> esc($this->request->getVar('booking_id')),
            'price'     => esc($this->request->getVar('price')),
            'base_price'=> esc($this->request->getVar('base_price')),
            'status'    => esc($this->request->getVar('status'))
        ]);

        $response = [
            'message' => 'Pembayaran berhasil ditambahkan',
        ];
        
        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($payment_id = null)
    {
        $rules = $this->validate([
            'booking_id'=> 'required|alpha_numeric',
            'price'     => 'required|integer',
            'base_price'=> 'required|integer',
            'status'    => 'required|in_list[Success,Failed,Pending]'
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->update($payment_id, [
            'booking_id'=> esc($this->request->getVar('booking_id')),
            'price'     => esc($this->request->getVar('price')),
            'base_price'=> esc($this->request->getVar('base_price')),
            'status'    => esc($this->request->getVar('status'))
        ]);

        $response = [
            'message' => 'Pembayaran berhasil diubah',
        ];

        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($payment_id = null)
    {
        $this->model->delete($payment_id);

        $response = [
            'message' => 'Pembayaran berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }
}
