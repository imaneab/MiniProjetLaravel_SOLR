<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{


    public function user(){
        return $this->belongsTo('App\User');    //lier un file à un seul utilisateur
    }
}
