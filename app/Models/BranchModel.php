<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchModel extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'branch_name',
        'hotel_type',
        'branch_location',
        'branch_description',
        'branch_logo',
        'branch_cover_image',
        'branch_facilities',
    ];
}
