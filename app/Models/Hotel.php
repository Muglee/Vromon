<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'facilities' => 'array',
    ];

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
