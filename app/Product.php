<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public $fillable = [
      "product_name",
      "product_image",
      "product_desc",
      "price",
      "qty",
      "category_id",
      "brand_id",
    ];

    public function getImage(){
        if(is_null($this->__get("product_image"))){
            return asset("media/product.jpeg");
        }
        return asset($this->__get("product_image"));
    }

    public function getPrice(){
        return "$".number_format($this->__get("price"),2);
    }

    public function getProductUrl(){
        return url("/product/{$this->__get("slug")}");
    }

    public function Category(){
        return $this->belongsTo("\App\Category","category_id");// tra ve 1 object
    }

    public function Brand(){
        return $this->belongsTo("\App\Brand");
    }

    public function toArray()
    {
        return  [
            "id"=>$this->__get("id"),
            "name"=>$this->__get("product_name"),
            "image"=> $this->getImage()
        ];
    }
}
