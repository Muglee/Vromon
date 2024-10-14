<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageBooked extends Model
{
    use HasFactory;
    protected $table = 'package_booked';
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'email',
        'country_code',
        'mobile',
        'passport',
        'passport_issue',
        'passport_expdate',
        'arrival_time',
        'arrival_point',
        'departure_time',
        'departure_point'
    ];
}
