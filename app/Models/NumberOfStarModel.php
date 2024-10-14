<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberOfStarModel extends Model
{
    use HasFactory;
    protected $table = 'number_of_stars';
    protected $fillable = [
        'number_of_stars',
    ];
}
