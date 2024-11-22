<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'branch_id',
        'user_id',
        'quantity',
        'amount',
    ];

    /**
     * Define relationships.
     */

    // A sale belongs to a service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // A sale belongs to a branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    // A sale belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
