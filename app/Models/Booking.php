<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'vehicle_id','user_id','customer_name','phone',
        'start_date','end_date','total_price','status'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}