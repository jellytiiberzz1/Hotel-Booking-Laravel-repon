<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'number_room', 'slug','status', 'image', 'description', 'price', 'usd', 'sale', 'date_form', 'date_to', 'idCategory', 'idKindRooms',
        'created_at','updated_at',

    ];
    public function Category(){
        return $this->belongsTo('App\Category','idCategory','id');
    }
    public function Kind_Rooms(){
        return $this->belongsTo('App\Kind_Rooms','idKindRooms','id');
    }
    public function Booking(){
        return $this->hasMany('App\Booking','idRoom','id');
    }
}
