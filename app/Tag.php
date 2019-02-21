<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    // protected $table = "tagovi"; // kada se nazivi modela (u jednini) i tabele (mnozini)
    //  nisu

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
