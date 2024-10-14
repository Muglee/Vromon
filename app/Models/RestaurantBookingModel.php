<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantBookingModel extends Model
{
    use HasFactory;
    protected $table = 'restaurant_booking';
    protected $fillable = [
        'checking_date',
        'slot_time',
        'item_name',
        'selected_table_name',
        'is_booked',
        'first_name', 
        'last_name',
         'phone_no',
         'email'
       
    ];

    protected $casts = ['slot_time' => 'json'];

}
