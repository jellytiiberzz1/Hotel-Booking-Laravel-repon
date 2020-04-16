<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'idUser', 'name', 'status', 'address', 'CMND', 'phone', 'email',
    ];

    public function User(){
        return $this->belongsTo('App\User','idUser','id');
    }
}
