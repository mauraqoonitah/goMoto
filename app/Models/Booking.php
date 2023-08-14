<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop_id',
        'motorcycle_id',
        'user_id',
        'booking_number',
        'book_date',
    ];
}
