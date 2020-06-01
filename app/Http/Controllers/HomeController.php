<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Psy\Util\Str;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $products = Product::all();
//        foreach ($products as $p){
//            $slug = \Illuminate\Support\Str::slug($p->__get("product_name"));
//            $p->slug = $slug.$p->__get("id");
//            $p->save();
//            // $p->update(["slug"=>$slug.$p->__get("id")]);
//        }
//        die("done");
        $featureds = Product::orderBy("updated_at","DESC")->limit(8)->get();
        $latest_1 = Product::orderBy("created_at","DESC")->limit(3)->get();
        $latest_2 = Product::orderBy("created_at","DESC")->offset(3)->limit(3)->get();
        return view("frontend.home",[
            "featureds" =>$featureds,
            "latest_1" => $latest_1,
            "latest_2" => $latest_2,
        ]);
    }

    public function category(Category $category){
//        $products = Product::where("category_id",$category->__get("id"))->paginate(12);
        $products = $category->Products()->paginate(12);
        return view("frontend.category",[
            "category"=>$category,
            "products"=> $products
        ]);
    }
}
