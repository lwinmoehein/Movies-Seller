<?php

namespace App\Http\Traits;
use App\Year;
use App\Country;
use App\Tag;

trait FilterTrait 
{
    function getYearFilters(){
        $years =Year::orderBy('year','desc')->get();
        return $years;
    }

    function getCategoryFilters(){
        $categories = Tag::orderBy('tag_name')->get();
        return $categories;
    }

    function getCountryFilters(){
        $countries = Country::orderBy('country_name')->get();
        return $countries;
    }
}
