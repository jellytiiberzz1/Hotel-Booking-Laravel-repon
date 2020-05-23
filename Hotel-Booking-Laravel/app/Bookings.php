<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'idCategory','idUser', 'name', 'amount', 'status', 'code_order', 'email', 'address', 'CMND', 'phone', 'date_from', 'date_to', 'additional_information',
    ];

    public function User(){
        return $this->belongsTo('App\User','idUser','id');
    }
    public function Category(){
        return $this->belongsTo('App\Category','idCategory','id');
    }
}
