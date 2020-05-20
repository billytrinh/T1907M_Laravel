<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    public $fillable = [
        "category_name"
    ];

    public function get($key){
        if(is_null($this->__get($key)))
            return "default value";
        return $this->__get($key);
    }
}
