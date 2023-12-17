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
        helper("text");
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

        $count = $this->request->getPost('count');

        for ($i = 0; $i < $count; $i++) {
            $this->bookingModel->save([
                'booking_id' => $this->request->getVar(increment_string('BK', 1)),
                'honorifics' => $this->request->getVar('honorifics')[$i],
                'first_name' => $this->request->getVar('first_name')[$i],
                'last_name' => $this->request->getVar('last_name')[$i],
                'id_number' => $this->request->getVar('id_number')[$i],
                'flight_id' => $this->request->getVar('flight_id'),
                'quantity' => $this->request->getVar('count')
            ]);
        }

        return redirect()->to('/booking');
    }
}
