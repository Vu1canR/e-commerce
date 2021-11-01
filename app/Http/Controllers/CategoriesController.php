<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Processor;
use App\Models\Product;
use App\Models\Pspec;
use App\Models\Product_spec;
use App\Models\Spec;

class CategoriesController extends Controller
{
    public function show($category){

        $category_name = str_replace("-"," ", $category);

        // $subcategiries = category::where('name', $category_name)
        //                         ->first()->subcategories;
        $categories = Category::all();
        $chosen_category = Category::where('name', $category_name)->with('subcategories.amount')->first();
        // return $categories;
     
        return view('categories', compact('chosen_category', 'categories'));

    }
}
