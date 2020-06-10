<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table="carts";
    protected $fillable= [
        "user_id",
        "is_checkout"
    ];

    public function getItems(){
        return $this->belongsToMany("\App\Product","cart_product")
            ->withPivot(["qty"]);
    }
}
