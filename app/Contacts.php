<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';


    protected $fillable = [
        'idUser', 'message',
    ];

    public function User(){
        return $this->belongsTo('App\User','idUser','id');
    }
}
