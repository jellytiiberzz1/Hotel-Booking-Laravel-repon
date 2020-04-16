<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kind_Rooms extends Model
{
    protected $table = 'kind__rooms';

    protected $fillable = [
        'idCategory', 'name', 'slug', 'status',
    ];
    public function Category(){
        return $this->belongsTo('App\Category','idCategory','id');
    }
}
