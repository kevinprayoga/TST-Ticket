<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class HomeController extends ResourceController
{
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

    public function home()
    {
        $response_airport = $this->getData('localhost:3000/airport/get-all');
        $data_airport = json_decode($response_airport);

        $viewData = [
            'title' => 'Home',
            'airports' => $data_airport->airports
        ];

        return view('layout/header', $viewData) . view('pages/home', $viewData) . view('layout/footer');
    }

    public function search()
    {
        $getData = [
            'origin' => $this->request->getGet('origin'),
            'destination' => $this->request->getGet('destination'),
            'date' => $this->request->getGet('date'),
            'capacity' => $this->request->getGet('capacity')
        ];

        $response_flight = $this->getData('localhost:3000/flight/get', $getData);
        $data_flight = json_decode($response_flight);

        $response_airport = $this->getData('localhost:3000/airport/get-all');
        $data_airport = json_decode($response_airport);

        foreach ($data_flight->flights as $flight) {
            $price = $flight->price;
            $price += ($price * 0.2);
        }

        // var_dump($getData);
        // var_dump($data_flight);

        $viewData = [
            'title' => 'Search Result',
            'flights' => $data_flight->flights,
            'airports' => $data_airport->airports,
            'count' => $getData['capacity']
        ];

        return view('layout/header', $viewData) . view('pages/search', $viewData) . view('layout/footer');
    }
}
