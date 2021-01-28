<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelKomentar extends Model
{
    //
    
    
    protected $table = 'komentar';
    protected $fillable = ['video_id','user_id','nama_user','nomorinduk','avatar','body'];


public function User()
    {
        return $this->belongsTo('User', 'nomorinduk', 'avatar');
    }
}