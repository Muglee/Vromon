<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedRecordModel extends Model
{
    use HasFactory;
    protected $table = 'booked_records';
}
