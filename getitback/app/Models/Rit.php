<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rit extends Model
{
    use HasFactory;

    protected $table = 'ritten';

    protected $fillable = [
        'status',
        'pickup_location',
        'dropoff_location',
        'scheduled_pickup_time',
        'scheduled_dropoff_time',
        'cost',
        'user_id',
    ];

    /**
     * Krijg de gebruiker die eigenaar is van de Rit.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
