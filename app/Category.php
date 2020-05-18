<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'status', 'image', 'price', 'usd', 'description'
    ];

    public function Kind_Rooms(){
        return $this->hasMany('App\Kind_Rooms','idCategory','id');
    }

}
