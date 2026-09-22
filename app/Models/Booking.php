<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Car;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}