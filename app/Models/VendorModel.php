<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    use HasFactory;
    protected $table = 'vendors';
    protected $fillable = [
        'vendor_name',
        'vendor_company_name',
        'vendor_phone_no',
        'vendor_email',
        'vendor_address',
        'password',
        'is_active',
    ];
}
