<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedCustomerInfo extends Model
{
    use HasFactory;

    protected $casts = [
        'guest_title' => 'array',
        'guest_first_name' => 'array',
        'guest_last_name' => 'array',
        'kid_title' => 'array',
        'kid_first_name' => 'array',
        'kid_last_name' => 'array',
    ];
}
