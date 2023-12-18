<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Pnr;

class BookingController extends ResourceController
{
    private static function generateRandomString() {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
    
        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
    
        return $randomString;
    }

    public function save()
    {
        $model_1 = model(Booking::class);
        $model_2 = model(Pnr::class);

        $booking_id = self::generateRandomString();
        $price = $this->request->getPost('price'); // Mark Not Done

        //insert into booking
        $username = $this->request->getPost('username');
        $model_1->addBooking($booking_id, $username, $price);

        //insert into pnr
        $quantity = $this->request->getPost('count');
        for ($i = 0; $i < $quantity; $i++) {
            $honorifics = $this->request->getPost('honorifics')[$i];
            $first_name = $this->request->getPost('first_name')[$i];
            $last_name = $this->request->getPost('last_name')[$i];
            $id_number = $this->request->getPost('id_number')[$i];
            $flight_id = $this->request->getPost('flight_id');

            $model_2->addPnr($booking_id, $honorifics, $first_name, $last_name, $id_number, $flight_id, $quantity);
        }
        
        return redirect()->to('/booking');
    }

    public function viewBookingPage()
    {
        $model_1 = model(Booking::class);
        $username = $this->request->getPost('username');
        $data = [
            'title' => 'Booking',
            'booking' => $model_1->getBooking($username)
        ];
        return view('layout/header', $data).view('pages/booking', $data).view('layout/footer');
    }
}