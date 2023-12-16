<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table      = 'payment';
    protected $primaryKey = 'payment_id';
    protected $returnType = 'object';
    protected $allowedFields = ['booking_id', 'price', 'base_price', 'status'];
}