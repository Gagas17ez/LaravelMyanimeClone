<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anime extends Model
{
    protected $table = 'id';

    protected $fillable = ['judul', 'sinposis', 'video_link', 'rating', 'poster_link', 'genre_id', 'animeinfo_id'];
}
