<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = 'id';
    protected $fillable = 'genre';

    public function anime(){
        return $this->hasMany('App\anime');
    }
}
