<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceSlug extends Model
{
    protected $table = 'service_slugs';

    protected $fillable = [
        'name', 'slug', 'status',
    ];

    public function kind_Rooms(){
        return $this->hasMany('App\Service','idServiceslug','id');
    }
}
