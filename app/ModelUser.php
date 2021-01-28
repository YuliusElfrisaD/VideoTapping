<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    //
    protected $table = 'users';
    protected $fillable = ['name','nomorinduk','status','avatar','password'];

      public function likes()
{
    return $this->belongsToMany('App\ModelVideo', 'likes', 'video_id', 'nomorinduk');
}

public function komentar()
  {
      return $this->hasMany('App\ModelKomentar');
  }
}