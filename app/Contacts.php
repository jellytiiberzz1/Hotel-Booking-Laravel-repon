<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';


    protected $fillable = [
        'fullname', 'email', 'phone', 'message',
    ];

    public function User(){
        return $this->belongsTo('App\User','idUser','id');
    }
}
