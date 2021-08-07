<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    

    public function anime(){
        return $this->belongsTo['App\anime'];
    }

    public function user(){
        return $this->belongsTo['App\User'];
    }
}

