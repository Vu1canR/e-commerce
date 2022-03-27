<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Spec;
use App\Models\SpecValue;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ProductController extends Controller
{

    public function index()
    {


        // $specs = ['Asus', 'Aorus', '6gb'];
        // $specs = [9];
        // $specs = [];
        $specs = [];
        if ($filters = request()->all()) {
            $specs = Arr::flatten($filters);
        }
        
        // $products = Product::where('sub_category_id', $subCatId)
        // ->with('specs')->get();

        // $cat_obj = Category::find($catId);
        // $subcat_obj = SubCategory::find($subCatId);
        // $cats =  Category::with('subcategories')->get();

        // $specs = Spec::where('sub_cat_id', $subCatId)->with('products')->get();

        $specs = Spec::where('sub_cat_id', 1)

            ->with(['values.products' => function ($query) use ($specs) {
                $query->withFilters($specs);
            }])
            ->limit(3)
            ->get();

        return $specs;
    }

    public function getCat()
    {

        $data['categories'] = Category::with('subcategories.specs.values')->get();
        $data['subcategories'] = SubCategory::with('category')
            ->with('specs.values')->get();
    
        return $data;
    }
}
