<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public $table='tags';

    protected $fillable = ['tag_name','tag_img'];

    public function movies(){
        return $this->belongsToMany(Movie::class, 'tagmovies', 'movie_id', 'tag_id');
    }

    public function series(){
            return $this->belongsToMany(Tag::class, 'tagseries', 'series_id', 'tag_id');
    }
}
