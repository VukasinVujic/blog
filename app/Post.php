<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body'
    ];


    protected static function published(){

        return self::where('published', 1)->get();
    }

    protected static function drafts(){

        return slef::where('published' , 0)->get();

    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    // $this->title
}


