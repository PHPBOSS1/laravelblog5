<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    //
    protected $fillable = ['title', 'slug', 'published', 'id'];



//    // Mutators
//    public function setSlugAttribute($value) {
//        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
//    }

//    public static function add($fields)
//    {
//        $post = new static;
////        $post->fill($fields);
//        $post->user_id = Auth::user()->id;
//        $post->save();
//
//        return $post;
//    }
}
