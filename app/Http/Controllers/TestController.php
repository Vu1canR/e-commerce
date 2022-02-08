<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class TestController extends Controller
{
    public function index()
    {

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

        $values = [

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
            ]

        ];

        $exists = Arr::exists($my_array['values'], 'value');

        $data = SubCategory::where('id', 1)->with('specs.values')->get();

        return $data;
    }
}
