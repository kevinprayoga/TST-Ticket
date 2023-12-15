<?php

namespace App\Controllers;

use App\Models\TransactionsModel;

class Transactions extends BaseController
{
    protected $transactionsModel;

    public function __construct()
    {
        $this->transactionsModel = new TransactionsModel();
    }

    public function index()
    {
        $transactions = $this->transactionsModel->findAll();
        dd($transactions);

        $data = [
            'title' => 'Daftar Transactions',
            'transactions' => $transactions
        ];

        echo view('pages/history');
    }
}
