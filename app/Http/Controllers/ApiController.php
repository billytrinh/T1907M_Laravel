<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function latestProducts(Request $request){
        $limit = $request->has("limit")?$request->get("limit"):10;
        $page = $request->has("page")?$request->get("page"):1;
        $products = Product::orderBy("created_at","DESC")->offset($limit*($page-1))
            ->limit($limit)->get()->toArray();
        return response()->json($products);
    }
}
