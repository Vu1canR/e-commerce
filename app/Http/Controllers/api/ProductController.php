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


        // $specs = ['8gb', 'TUF Gaming'];
        $my_array = [
            "values" => [
                [
                    "id" => 3,
                    "value" => "PCI Express 4.0",
                    "test" => 22,
                    "pivot" => [
                        "spec_id" => 63,
                        "spec_value_id" => 3
                    ],

                    "products" => [
                        "id" => 22,
                        "category_id" => 4,
                        "name" => "Gigabyte GeForce RTX 2060 SUPER OC 6GB GDDR6"
                    ],
                ],

                [
                    "id" => 11,
                    "value" => "PCI Express 3.0",
                    "test" => 1,
                    "pivot" => [
                        "spec_id" => 63,
                        "spec_value_id" => 11
                    ],

                    "products" => [
                        "id" => 1,
                        "category_id" => 4,
                        "name" => "Asus GeForce RTX 3070 8GB GDDR6"
                    ],
                ],
            ],

            "values" => [
                [
                    "id" => 3,
                    "value" => "PCI Express 3.0",
                    "test" => 22,
                    "pivot" => [
                        "spec_id" => 63,
                        "spec_value_id" => 3
                    ],

                    "products" => [
                        "id" => 22,
                        "category_id" => 4,
                        "name" => "Gigabyte GeForce RTX 2060 SUPER OC 6GB GDDR6"
                    ],
                ],

                [
                    "id" => 11,
                    "value" => "PCI Express 3.0",
                    "test" => 1,
                    "pivot" => [
                        "spec_id" => 63,
                        "spec_value_id" => 11
                    ],

                    "products" => [
                        "id" => 1,
                        "category_id" => 4,
                        "name" => "Asus GeForce RTX 3070 8GB GDDR6"
                    ],
                ],
            ]
        ];
        $specs = request()->input('specs', []);
        // $products = Product::where('sub_category_id', $subCatId)
        // ->with('specs')->get();

        // $cat_obj = Category::find($catId);
        // $subcat_obj = SubCategory::find($subCatId);
        // $cats =  Category::with('subcategories')->get();

        // $specs = Spec::where('sub_cat_id', $subCatId)->with('products')->get();

        $specs = Spec::where('sub_cat_id', 1)
            // ->with(['products' => function ($query) {
            //     $query->withFilters(
            //         request()->input('specs', []),
            //     );
            // }])

            // ->with(['values.products' => function ($query) use ($specs) {
            //     $query->with('values', function ($query) use ($specs) {
            //         $query->whereIn('value', $specs);
            //     });
            // }])->limit(3)

            ->with('values.products')
            // ->with('values')

            // ->with('values')->limit(3)
            // ->with(['values' => function ($q) {
            //     $q->with('products');
            // }])
            // ->groupBy('values')
            ->limit(3)
            // ->union('values')
            ->get();
        // $x = $specs->values->union($values);
        // return $products; 
        // return view('products', compact('products', 'cat_obj', 'subcat_obj', 'specs'));

        // $specs = Spec::where('sub_cat_id', 1)->withCount('values')->get();
        // $specs = Spec::where('sub_cat_id', 1)->with('values')->get();
        // $specs = SpecValue::with('products')->get();
        // $array = Arr::pluck($values, 'products');
        // $exists = Arr::exists($my_array['values'], 'test');
        // $array = $my_array->groupBy('values');
        return $specs;
    }

    public function getCatId()
    {


        if (request('category') == null)
            $data = Category::all();
        else
            $data = Category::with(['subcategories' => function ($q) {
                $q->where('category_id', request()->input('category'))->with('specs.values');
            }])

                // $data = SubCategory::where('category_id', 4)->with('specs')
                // $data = SubCategory::with('specs')

                // ->where('category_id', request('category'))

                // $data = Category::whereHas('subcategories', function ($query) {
                //     $query->where('id', re);
                // })

                // $data = Category::with('subcategories')->first();

                ->get();


        // $subcategories = SubCategory::where('id')        

        return $data;
    }
}
