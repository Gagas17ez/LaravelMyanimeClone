<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anime extends Model
{
    protected $table = 'id';
    protected $fillable = ['judul', 'sinposis', 'type' , 'aired_date', 'studio', 'producer' , 'status','episode_count' ,'video_link', 'rating', 'poster_link', 'genre_id'];

    public function komentar(){
        return $this->hasMany('App\komentar');
    }
}
