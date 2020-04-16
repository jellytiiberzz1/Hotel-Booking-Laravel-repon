<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'idRoom','idServiceslug', 'quantity', 'price', 'note','created_at','updated_at'

    ];
    public function Rooms(){
        return $this->belongsTo('App\Rooms','idRoom','id');
    }

    public function ServiceSlug(){
        return $this->belongsTo('App\ServiceSlug','idServiceslug','id');
    }


}
