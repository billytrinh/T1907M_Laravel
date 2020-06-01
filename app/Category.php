<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    public $fillable = [
        "category_name"
    ];
    // version 6.x
//    public function getRouteKeyName(){
//        return "slug";
//    }

    public function getCategoryUrl(){
        return url("/category/{$this->__get("slug")}");
    }

    public function get($key){
        if(is_null($this->__get($key)))
            return "default value";
        return $this->__get($key);
    }

    public function Products(){
        return $this->hasMany("\App\Product");// tra ve 1 collection
    }
}
