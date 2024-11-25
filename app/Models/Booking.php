<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'full_names',
        'email',
        'phone',
        'service',
        'location',
        'date',
        'status', // Add the status column here
    ];
}
