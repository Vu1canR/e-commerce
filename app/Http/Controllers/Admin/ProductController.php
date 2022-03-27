<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Spec;
use App\Models\Category;
use App\Models\Comment;
use App\Models\SpecValue;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::where('category_id', 1)->pluck('id', 'name');
        $products = Product::with('category')
            ->with('subcategory')
            ->get();
        // return $products;

        return view('admin.products.index', compact('categories', 'subcategories', 'products'));
    }

    public function create()
    {
        // abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $categories = '';
        // Category::with('subcategories')
        //     ->whereHas('subcategories')
        //     ->get();
        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)

    {

            $specs_obj = Spec::where('sub_cat_id', $request->subcategory_id)
            ->orderBy('id', 'asc')
            ->pluck('spec_name', 'id');

        // $specs_array = $specs_obj->toArray();
        // // return array_values($specs_array);
        // $validation_array = [
        //     'category_id' => 'required',
        //     'name' => 'required',
        //     // 'model' => 'required',
        //     // 'brand' => 'required',
        //     // 'price' => 'required',
        //     'description' => 'required',
        //     'images' => 'required',
        //     'keywords' => 'required',
        //     'subcategory_id' => 'required',
        //     'store_code' => 'required',
        // ];

        $temp = [];

        // foreach ($specs_obj as $spec) {
        //     $temp[] = $spec;
        //     if($request->has($spec)){
        //         $temp[] = $request->$spec;
        //     }
        // }


        $temp = [];

        foreach ($specs_obj as $spec) {
            // $temp[] = trim($spec, ' ');
            $spec_replaced = preg_replace('/\s+/', '', $spec);
            // $temp[] = $spec_replaced;
            if($request->has($spec_replaced)){      
                // $temp[] = $spec_replaced;          
                $temp[] = $request->$spec_replaced;
            }
        }
        
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
        ]);
        $product->values()->sync($temp);
        $product->specs()->sync($temp);
        // $test = $request->all();
        // return $temp;
        // $product->specs()->sync($request->input('specs', []));
        // return $temp;

        // $product = Product::create(request([
        //     "category"
        // ]));

        // $product = Product::create($request->all());
        // $product->specs()->sync($request->input('specs', []));
        // $product->values()->sync($request->input('values', []));
        // // $product->categories()->sync($request->input('categories', []));
        // // $product->tags()->sync($request->input('tags', []));

        // if ($request->input('photo', false)) {
        //     $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        // }

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        // }

        return redirect()->route('admin.products.create');

    }
}
