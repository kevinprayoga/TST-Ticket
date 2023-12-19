<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Booking;
use App\Models\Pnr;

class BookingController extends ResourceController
{
    public function postData($url, $data)
    {
        // Initialize cURL session
        $ch = curl_init($url);

        // Set the options for the cURL session
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        // Execute the cURL session and store the response
        $response = curl_exec($ch);

        // Close the cURL session
        curl_close($ch);

        // Return the response
        return $response;
    }

    private function getData($url, $data = [])
    {
        $url = rtrim($url, '?'); // Remove trailing question mark if it exists
        $url .= '?' . http_build_query($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;
    }

    private static function generateRandomString() {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
    
        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
    
        return $randomString;
    }

    private function priceAfterTax($price, $quantity) {
        return $quantity * $price * 1.2;
    }

    public function save()
    {
        $getData['flight_id'] = $this->request->getVar('flight_id');
        $response_flight = $this->getData('localhost:8080/flight/get-per-id', $getData);
        $data_flight = json_decode($response_flight);

        $model_1 = model(Booking::class);
        $model_2 = model(Pnr::class);

        $booking_id = self::generateRandomString();
        $quantity = $this->request->getPost('count');
        $flight_id = $this->request->getVar('flight_id');

        //insert into booking
        $price = $this->priceAfterTax($data_flight->flight->price, $quantity);
        $username = 'ilmagita';
        $model_1->addBooking($booking_id, $username, $price, $flight_id);

        //insert into pnr
        for ($i = 0; $i < $quantity; $i++) {
            $pnr = self::generateRandomString();
            $honorifics = $this->request->getPost('honorifics')[$i];
            $first_name = $this->request->getPost('first_name')[$i];
            $last_name = $this->request->getPost('last_name')[$i];
            $id_number = $this->request->getPost('id_number')[$i];

            $model_2->addPnr($pnr, $booking_id, $honorifics, $first_name, $last_name, $id_number, $flight_id, $quantity);

            $airline_booking = [
                // 'seg1' => '083fb78fe99d91ec891dc97e2ac10f14',
                // 'seg2' => '499de4ba50697d484d8e4de59a32c3bb',
                'flight_id' => $flight_id,
                'pnr' => $pnr,
            ];
            $response_airline = $this->postData('localhost:8080/booking/create/', $airline_booking);       
            var_dump($airline_booking);
            var_dump($response_airline);
        }
        var_dump($airline_booking);
        var_dump($response_airline);
        return redirect()->to('/history/pending');
    }

    public function pay() {
        $model = model(Booking::class);

        $booking_id = $this->request->getVar('booking_id');
        $result = $model->updateBooking($booking_id, "Success");

        return redirect()->to('/history');
    }

    public function cancel() {
        $model = model(Booking::class);

        $booking_id = $this->request->getVar('booking_id');
        $result = $model->updateBooking($booking_id, "Failed");

        return redirect()->to('/history');
    }

    public function viewBookingPage()
    {
        $capacity = $this->request->getVar('counter');
        $flight_id = $this->request->getVar('flight_id');

        $data = [
            'title' => 'Booking',
            'counter' => $capacity,
            'flight_id' => $flight_id
        ];
        return view('layout/header', $data).view('pages/booking', $data).view('layout/footer');
    }

    public function viewHistoryPage()
    {
        $model = model(Booking::class);
        $username = 'ilmagita';
        $data = [
            'title' => 'History',
            'booking' => $model->getBooking($username),
        ];

        return view('layout/header', $data).view('pages/historyPages/history', $data).view('layout/footer');
    }

    public function viewHistorySuccessPage()
    {
        $model = model(Booking::class);
        $username = 'ilmagita';
        $data = [
            'title' => 'Booking-success',
            'booking' => $model->getBooking($username),
        ];

        return view('layout/header', $data).view('pages/historyPages/success', $data).view('layout/footer');
    }

    public function viewHistoryPendingPage()
    {
        $model = model(Booking::class);
        $username = 'ilmagita';
        $data = [
            'title' => 'Booking-pending',
            'booking' => $model->getBooking($username),
        ];

        return view('layout/header', $data).view('pages/historyPages/pending', $data).view('layout/footer');
    }

    public function viewHistoryFailedPage()
    {
        $model = model(Booking::class);
        $username = 'ilmagita';
        $data = [
            'title' => 'Booking-failed',
            'booking' => $model->getBooking($username),
        ];

        return view('layout/header', $data).view('pages/historyPages/failed', $data).view('layout/footer');
    }
}
