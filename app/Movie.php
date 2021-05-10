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
    public function copyItems(){
        return $this->morphMany(CopyItem::class,'copiable');
    }
    public function orderedCopyItems(){
        return $this->copyItems()->where('status',CopyItemStatus::ADDED_TO_LIST);
    }

    public function confirmedCopyItems(){
        return $this->copyItems()->where('status',CopyItemStatus::CONFIRMED_ORDER);
    }

    public function purchasedCopyItems(){
        return $this->copyItems()->where('status',CopyItemStatus::CONFIRMED_PURCHASE);
    }
}
