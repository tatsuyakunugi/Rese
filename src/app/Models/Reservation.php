<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'reservation_datetime',
        'number_of_people',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    protected $appens = [
        'reservation_date',
        'reservation_time',
    ];

    public function getReservationDateAttribute()
    {
        $reservation_datetime = Carbon::parse($this->reservation_datetime);
        $reservation_date = $reservation_datetime->format('Y-m-d');

        return $reservation_date;
    }

    public function getReservationTimeAttribute()
    {
        $reservation_datetime = Carbon::parse($this->reservation_datetime);
        $reservation_time = $reservation_datetime->format('H:i');

        return $reservation_time;
    }
}
