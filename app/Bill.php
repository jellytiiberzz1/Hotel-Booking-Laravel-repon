<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'idRoom', 'code_order', 'image', 'price', 'idBooking', 'created_at'
    ];

    public function Rooms(){
        return $this->belongsTo('App\Rooms','idRooms','id');
    }
    public function Booking(){
        return $this->belongsTo('App\Bookings','idBooking','id');
    }
}
