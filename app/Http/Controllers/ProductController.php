<?php

namespace App\Http\Controllers;

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

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'admin'])->only(['create', 'store']);
    //     // $this->middleware('admin')->only(['create', 'store']);
    // }

    public function index()
    {

        $categories = Category::all();
        $subcategories = SubCategory::where('category_id', 1)->pluck('id', 'name');
        $products = Product::with('category')
            ->with('subcategory')
            ->get();
        // return $products;

        return view('admin.products.add', compact('categories', 'subcategories', 'products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $categories = Category::with('subcategories.specs')
            ->whereHas('values')
            ->get();

        $values = SpecValue::all()->pluck('name', 'id');

        return view('admin.products.create', compact('categories', 'values', 'tags'));
    }


    public function store(Request $request)

    {

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

        // return redirect()->route('admin.products.index');
    }


    public function homeProducts()
    {
        $products = Product::inRandomOrder()->limit(5)->get();
        $recent = Product::orderBy('id', 'desc')->take(5)->get();

        return view('welcome', compact('products', 'recent'));
    }

    public function showAll($catId, $subCatId, $subcat)
    {
        $products = Product::where('sub_category_id', $subCatId)
            ->with('specs')->get();
        $cat_obj = Category::find($catId);
        $subcat_obj = SubCategory::find($subCatId);
        $cats = Category::with('subcategories')->get();

        $specs = Spec::where('sub_cat_id', $subCatId)->with('products')->get();

        return view('products', compact('products', 'cat_obj', 'subcat_obj', 'specs'));
    }

    public function show($store_code, $product)
    {

        $dash_replaced = str_replace("-", " ", $product);
        $product_object = Product::where('name', $dash_replaced)
            ->with('specs')->first();
        $comments = Comment::where('product_id', $product_object->id)
            ->with('user')->orderBy('created_at', 'asc')->get();
        $cat_obj = Category::find($product_object->category_id);
        $subcat_obj = SubCategory::find($product_object->sub_category_id);
        return view('product', compact('comments', 'product_object', 'product', 'cat_obj', 'subcat_obj'));
    }


    public function byCategory(Request $request)
    {
        $products = Category::find($request->id);

        return $products->paginate(12);
    }

    public function addProduct(Request $request)
    {
        $categories = Category::all();
        $subcategories = SubCategory::where('category_id', 1)->pluck('id', 'name');
        $products = Product::with('category')
            ->with('subcategory')
            ->get();
        // return $products;

        return view('add', compact('categories', 'subcategories', 'products'));
    }

    public function storeb(Request $request)
    {
        // $subcategory = $request->subcategory_id;
        // $specs_obj = Spec::where('sub_cat_id', $subcategory)
        //     ->orderBy('id', 'asc')
        //     ->pluck('property', 'id');

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

        // // Giving reqiured value to each spec in array

        // foreach (array_values($specs_array) as $spec) {
        //     $validation_array[$spec] = 'required';
        // }

        // $raw_data = $request->except('images');
        // $av = [];
        // array_push($av, array_values($raw_data));
        // $spec_values = array_slice($av[0], 7);


        // $images = [];
        // if ($files = $request->file('images')) {
        //     foreach ($files as $file) {
        //         $name = $file->getClientOriginalName();
        //         $file->move(public_path('/images' . $subcategory), $name);
        //         $images[] = $name;
        //     }
        // }

        // // Validates given specs

        // try {
        //     $validator = Validator::make(
        //         $request->all(),
        //         $validation_array
        //     );

        //     if ($validator->fails()) {
        //         return redirect('add')
        //             ->withErrors($validator)
        //             ->withInput();
        //     }
        // } catch (Exception $e) {
        //     echo 'Message: ' . $e->getMessage();
        // }


        // $product = Product::create([
        //     'category_id' => $request->category_id,
        //     'name' => $request->name,
        //     // 'model' => $request->model,
        //     // 'brand' => $request->brand,
        //     // 'price' => $request->price,
        //     'description' => $request->description,
        //     'images' => implode('|', $images),
        //     'keywords' => $request->keywords,
        //     'subcategory_id' => $request->subcategory_id,
        //     'store_code' => $request->code,
        // ]);

        // // Preparing data for pivot table 

        // $attach_data = [];
        // for ($i = 0; $i < count(array_keys($specs_array)); $i++) {
        //     $attach_data[array_keys($specs_array)[$i]] = ['value' => $spec_values[$i]];
        // }
        // $product->specs()->attach($attach_data);

        // return redirect()->back()->with('message', 'Data inserted!!!');;
    }

    public function getId(Request $request, $category_id = null, $selected_cat_subcat = null, $specs = null)
    {
        $category_id = $request->get('category_id');
        $subcategory_id = $request->get('subcategory_id');

        $subcat_collection = Category::find($category_id);
        $subcategories = $subcat_collection->subCategories->pluck('id', 'name');
        $subcat_first_id = $subcat_collection->subcategories->pluck('id')->first();

        $specs = Spec::where('sub_cat_id', $subcat_first_id)->pluck('property', 'id');
        $sel_cat_specs = Spec::where('sub_cat_id', $subcategory_id)->pluck('property', 'id');

        return compact('category_id', 'subcategories', 'specs', 'sel_cat_specs');
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->quantity = $request->quantity;
        $product->save();
        $quantity = $product->quantity;
        $id = $request->id;

        return compact('quantity', 'id');
    }

    public function search(Request $request)
    {
        $search = $request->user_input;
        $categories = Category::all();
        $result = Product::where('name', 'like', '%' . $search . '%')->get();
        // return $result;
        return view('search-result', compact('result', 'categories'));
    }

    public function axiosSearch(Request $request)
    {
        $result = Product::where('name', 'like', '%' . $request->user_input . '%')->paginate(5);
        return compact('result');
    }
}
