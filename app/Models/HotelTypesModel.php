<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelTypesModel extends Model
{
    use HasFactory;
    protected $table = 'hotel_types';
    protected $fillable = [
        'hotel_type',
    ];
}
