<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = 'id';
    protected $fillable = ['no_tlp', 'tgl_lahir', 'tempat_lahir	' , 'bio', 'profile_pic', 'user_id'];

    public function user(){
        return $this->belongsTo['App\User'];
    }
}
