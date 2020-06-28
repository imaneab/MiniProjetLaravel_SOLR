<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = ['title', 'path_image', 'description', 'date', 'lieu'];
}
