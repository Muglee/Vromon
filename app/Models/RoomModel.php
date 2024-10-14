<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $fillable = [
        'room_name',
        'room_type',
        'no_of_guest',
        'room_price',
        'room_image',
    ];
}
