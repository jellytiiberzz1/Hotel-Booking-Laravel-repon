<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'number_room', 'slug','status', 'name', 'address', 'CMND', 'phone', 'date_from', 'date_to', 'idCategory', 'idKindRooms',
        'created_at','updated_at',

    ];
    public function Category(){
        return $this->belongsTo('App\Category','idCategory','id');
    }
    public function Kind_Rooms(){
        return $this->belongsTo('App\Kind_Rooms','idKindRooms','id');
    }

}
