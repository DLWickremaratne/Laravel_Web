<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //each post going to have a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
