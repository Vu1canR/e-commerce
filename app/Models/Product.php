<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Comment;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SpecValue;
use App\Models\Spec;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public $timestamps = false;

    // protected $fillable = ['category_id','name', 'description','keywords','subcategory_id','store_code'];
    protected $fillable = ['category_id', 'name', 'model', 'brand', 'price', 'description', 'images', 'keywords', 'subcategory_id', 'store_code'];

    public function specs()
    {

        return $this->belongsToMany(Spec::class);
        // return $this->belongsToMany(Spec::class)->withPivot('value');

    }

    public function values()
    {
        // return $this->hasMany(SpecValue::class);
        return $this->belongsToMany(SpecValue::class);
    }

    public function pivotValue()
    {

        return $this->belongsToMany(Spec::class);
    }

    public function addComment($body, $user_id, $product_id)
    {

        Comment::create([
            'body' => $body,
            'user_id' => $user_id,
            'product_id' => $product_id
        ]);
    }

    public function comments()
    {
        return $this->HasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function scopeWithFilters($query, $specs)
    {

        // return $query->with('values')->whereIn('value', $specs);

        // return $query->where(count($specs), function ($query) use ($specs) {
        //     $query->with(['values'])->whereIn('value', $specs);
        // });

        return $query->when(count($specs), function ($query) use ($specs) {
            $query->with(['values'])->whereIn('value', $specs);
        });

        // $results = Post::whereHas('companions', function ($query) use ($companion_id) {
        //     $query->whereIn('companions.id', $companion_id);
        // })

        // return $query->when(count($manufacturers), function ($query) use ($manufacturers) {
        //     $query->whereIn('manufacturer_id', $manufacturers);
        // })

        // Event::whereHas('participants', function ($query) {
        //     return $query->where('IDUser', '=', 1);
        // })->get();
        // 'values' => function ($query) {
        //     $query->whereIn($query, $specs);
        // }

        // ->when(count($categories), function ($query) use ($categories) {
        //     $query->whereIn('category_id', $categories);
        // })
        // ->when(count($prices), function ($query) use ($prices) {
        //     $query->where(function ($query) use ($prices) {
        //         $query->when(in_array(0, $prices), function ($query) {
        //             $query->orWhere('price', '<', '5000');
        //         })
        //             ->when(in_array(1, $prices), function ($query) {
        //                 $query->orWhereBetween('price', ['5000', '10000']);
        //             })
        //             ->when(in_array(2, $prices), function ($query) {
        //                 $query->orWhereBetween('price', ['10000', '50000']);
        //             })
        //             ->when(in_array(3, $prices), function ($query) {
        //                 $query->orWhere('price', '>', '50000');
        //             });
        //     });
        // });

    }
}
