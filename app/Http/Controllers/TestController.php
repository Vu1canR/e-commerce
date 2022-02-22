<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Spec;
use App\Models\SpecValue;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $values = [
            [
                "id" => 25,
                "category_id" => 4,
                "name" => "Msi GeForce RTX 3070 Gaming X Trio 8GB GDDRX6",
                "description" => "Name=> GeForce RTX 3070\r\nMemory=> 8 GB\r\nMemory type=> GDDRX6\r\nConnectors=> HDMI - 1 pcs., DisplayPort - 3 pcs.",
                "slug" => "gpu nvidia rtx",
                "created_at" => null,
                "updated_at" => null,
                "sub_category_id" => 1,
                "store_code" => 1,
                "images" => "pr_2019_1_13_8_40_32_538_05.webp|pr_2019_1_14_8_40_16_725_00.jpg|pr_2019_1_14_8_40_20_115_01.jpg|pr_2019_1_14_8_40_26_194_03.jpg|pr_2019_1_14_8_40_23_303_02.jpg|pr_2019_1_14_8_40_29_444_04.jpg",
                "price" => 7680,
                "preview" => null,
                "quantity" => 3,
                "pivot" => [
                    "spec_value_id" => 17,
                    "product_id" => 25
                ],
                "values" => [
                    [
                        "id"=> 2,
                        "value"=> "Aorus",
                        "test"=> 22,
                        "pivot" => [
                            "product_id"=>  22,
                            "spec_value_id"=>  2
                        ]
                    ],
                
                    [
                        "id"=> 7,
                        "value"=> "6gb",
                        "test"=> 22,
                        "pivot"=> [
                            "product_id"=> 22,
                            "spec_value_id"=> 7
                        ]
                    ]   
                ]
            ],
            [
                "id" => 37,
                "category_id" => 4,
                "name" => "Msi RTX 3080TI Armor",
                "description" => "GPU",
                "slug" => "graphics-card",
                "created_at" => null,
                "updated_at" => null,
                "sub_category_id" => null,
                "store_code" => null,
                "images" => null,
                "price" => 0,
                "preview" => null,
                "quantity" => null,
                "pivot" => [
                    "spec_value_id" => 17,
                    "product_id" => 37
                ],
                "values" => [
                    [
                    "id"=> 2,
                    "value"=> "Aorus",
                    "test"=> 22,
                    "pivot" => [
                        "product_id"=>  22,
                        "spec_value_id"=>  2
                        ]
                    ]
              
                ]
            ]
        ];
        
        // $values = [
        //     [
        //     "id"=> 2,
        //     "value"=> "Aorus",
        //     "test"=> 22,
        //     "pivot" => [
        //         "product_id"=>  22,
        //         "spec_value_id"=>  2
        //         ]
        //     ],
            
        //     [
        //     "id"=> 7,
        //     "value"=> "6gb",
        //     "test"=> 22,
        //     "pivot"=> [
        //         "product_id"=> 22,
        //         "spec_value_id"=> 7
        //      ]
        //     ]    
        // ];

        $specs = [1,9, 7, 17];
        $specs = [];
        $specs = ['Asus', 'Msi', '10gb'];
        $values = ['Asus'];
        // $data = SubCategory::where('id', 1)->with('specs.values')->get();
        
        // $values = SpecValue::skip(2)->take(5)->get();

        $values =  Spec::where('sub_cat_id', 1)

        ->with(['values' => function ($query) use ($specs) {
                    $query->whereIn('value', $specs)->with('products');

            }])
        // ->with(['values.products' => function ($query) use ($specs) {
        //     $query->with('values', function ($query) use ($specs) {
        //         $query->whereIn('value', $specs);
        //     });
        // }])

        // ->with(['values' => function ($query) use ($specs) {
        //     $query->with('products.values', function ($query) use ($specs) {
        //         $query->where('spec_value_id','!=', 17 )->whereIn('value', $specs);
        //     });
        // }])


        // $values = SpecValue::where('value', 'Msi')
        // ->with(['products' => function ($query) use ($specs) {
        //     $query->with('values', function ($query) use ($specs) {
        //         // $query->select(DB::raw('count(*) as value'));
        //         $query->whereIn('value', $specs);
        //         // $query->select('select * from users where active = ?', [1]);
        //     });
        // }])


        ->get();
        // $values = Arr::crossJoin($values[0]['values'], $values[1]['values']);
        return $values;
    }

    public function values(Request $request){

        return $request->values();

    }
}
