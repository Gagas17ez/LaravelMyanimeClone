<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    protected $table = 'id';
    protected $fillable = ['komentar', 'rating', 'created_at' , 'updated_at', 'user_idkomen', 'anime_id'];

    public function anime(){
        return $this->belongsTo['App\anime'];
    }

    public function user(){
        return $this->belongsTo['App\User'];
    }
}

