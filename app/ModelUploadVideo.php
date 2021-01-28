<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUploadVideo extends Model
{
    //
    protected $table = 'uploadvideo';
    protected $fillable = ['video','videoname','mapel'];
}
