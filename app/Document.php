<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['code','title', 'path', 'description', 'user_id', 'type', 'name'];
}
