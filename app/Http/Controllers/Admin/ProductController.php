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

        $products = Product::all();

        $categories = Category::with('subcategories')
            ->whereHas('subcategories')
            ->get();

        $values = SpecValue::all()->pluck('name', 'id');

        return view('admin.products.create', compact('categories', 'values', 'products'));
    }


    // public function store()

    // {
    //     $product = Product::create($request->all());
    //     $product->categories()->sync($request->input('categories', []));
    //     $product->tags()->sync($request->input('tags', []));

    //     if ($request->input('photo', false)) {
    //         $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
    //     }

    //     if ($media = $request->input('ck-media', false)) {
    //         Media::whereIn('id', $media)->update(['model_id' => $product->id]);
    //     }

    //     return redirect()->route('admin.products.index');
    // }
}
