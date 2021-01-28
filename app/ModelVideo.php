<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelVideo extends Model
{
    //
    protected $table = 'video';
    protected $fillable = [
        'nomorinduk', 'username','status','mapel','title','judulvideo','format','deskripsi','sizevideo',
    ];

    public function likes()
{
    return $this->belongsToMany('App\ModelUser', 'likes');
}
}