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

    public function create()
    {
        session();
        $data = [
            'title' => 'Booking',
            'validation' => \Config\Services::validation()
        ];

        return view('layout/header', $data).view('pages/booking').view('layout/footer');
    }
    
    public function save()
    {
        //validasi input
        if(!$this->validate([
            'honorifics' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Honorifics harus diisi.'
                ]
            ],
            'first_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'First Name harus diisi.'
                ]
            ],
            'last_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Last Name harus diisi.'
                ]
            ],
            'id_number' => [
                'rules' => 'required|is_unique[booking.id_number]',
                'errors' => [
                    'required' => 'NIK harus diisi.',
                    'is_unique' => 'NIK sudah terdaftar.'
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', 'Data gagal ditambahkan.');
        }

        $this->bookingModel->save([
            'honorifics' => $this->request->getVar('honorifics'),
            'first_name' => url_title($this->request->getVar('first_name'), '-', true),
            'last_name' => url_title($this->request->getVar('last_name'), '-', true),
            'id_number' => $this->request->getVar('id_number'),
            'flight_id' => $this->request->getVar('flight_id')
        ]);

        // session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/booking');
    }
}
