<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
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
        $categories = Category::paginate(20);
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

    public function editCategory($id){
//        $category = Category::find($id);
//        if(is_null($category))
//            abort(404);
        $category = Category::findOrFail($id);
        return view("category.edit",["category"=>$category]);
    }

    public function updateCategory($id,Request $request){
        $category = Category::findOrFail($id);
        $request->validate([
            "category_name"=> "required|min:6|unique:categories,category_name,{$id}"
        ]);
        try {
            $category->update([
                "category_name"=> $request->get("category_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-category");
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        try{
            $category->delete();
        }catch (\Exception $exception){
        }
        return redirect()->to("/list-category");
    }

    public function listProduct(){
        $products = Product::paginate(20);
        return view("product.list",["products"=>$products]);
    }

    public function newProduct(){
        $categories = Category::all();
        $brands = Brand::all();
        return view("product.new",[
                "categories"=>$categories,
                "brands" => $brands
            ]);
    }
}
