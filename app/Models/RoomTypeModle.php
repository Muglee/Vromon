<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypeModle extends Model
{
    use HasFactory;
    protected $table = 'room_types';
    protected $primaryKey = 'room_type_id';
    public $incrementing=true;
    protected $fillable = [
        'room_type',
    ];
}
