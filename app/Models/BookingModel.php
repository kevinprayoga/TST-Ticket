<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table      = 'booking';
    protected $primaryKey = 'pnr';
    protected $useTimestamps = true;
    protected $returnType = 'object';
}