<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Product;

class Category extends Model
{
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
