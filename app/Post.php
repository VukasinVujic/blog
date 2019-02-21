<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id', 
    ];


    protected static function published(){

        return self::where('published', 1);
    }

    protected static function drafts(){

        return slef::where('published' , 0)->get();

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    // $this->title

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}


