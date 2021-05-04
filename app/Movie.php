<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    public $table = 'movies';

    protected $fillable = [
        'title','code_no','img_name','year','country_id','description','file_size','artist','url','quality'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tagmovies', 'movie_id', 'tag_id');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function copies(){
        return $this->morphMany(Movie::class,'copiable');
    }
}
