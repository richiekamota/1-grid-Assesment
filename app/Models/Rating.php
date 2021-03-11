<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function posts()
    {
      return $this->belongsTo('App\Models\Post');
    }

    public function users()
    {
      return $this->belongsTo('App\Models\User');
    }
}
