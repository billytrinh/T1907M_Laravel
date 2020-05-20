<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{

    public function index(){
        return view("home");
    }

    public function listCategory(){
        // Query builder
        //$categories = DB::table("categories")->get();
        // Model (ORM)
        $categories = Category::all();
        // show with condition: start from D
        //$categories = Category::where("category_name","LIKE","D%")->get();
       // dd($categories);
        return view("category.list",[
            "categories"=> $categories
        ]);
    }

    public function newCategory(){
        return view("category.new");
    }

    public function saveCategory(Request $request){
        $request->validate([
           "category_name"=> "required|string|min:6|unique:categories"
        ]);
        try{
            Category::create([
                "category_name"=> $request->get("category_name")
            ]); // return an Object of Category Model
//            DB::table("categories")->insert([
//                "category_name"=> $request->get("category_name"),
//                "created_at"=> Carbon::now(),
//                "updated_at"=> Carbon::now(),
//            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-category");
    }
}
