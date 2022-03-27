<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Spec;
use App\Models\SpecValue;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\countOf;

class TestController extends Controller
{
    public function index()
    {
        
        $data = SubCategory::find(1)->category;
        // whereHas(['subcategories', function ($query) {
        // $query->where('category')
        // }])


        return $data;
    }

    public function values(Request $request){

        return $request->values();

    }
}
