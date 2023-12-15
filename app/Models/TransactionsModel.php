<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $table      = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $returnType = 'object';
}