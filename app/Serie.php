<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //
    public $table='series';

    protected $fillable = [
        'code_no','title','country_id',
        'year','season','episode','file_size',
        'complete_ongoing','poster','detail','url',

    ];
    public function tags(){
        return $this->belongsToMany(Tag::class, 'tagseries', 'series_id', 'tag_id');
    }
    public function country(){
        return $this->belongsTo('App\Country','country_id');
    }

    public function copies(){
        return $this->morphMany(Serie::class,'copiable');
    }
}
