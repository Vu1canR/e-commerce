<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function values()
    {
        // return $this->belongsToMany(SpecValue::class);
        return $this->belongsToMany(SpecValue::class);
    }
}
