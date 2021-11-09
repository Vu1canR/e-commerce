<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Comment;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{   
    public $timestamps = false;
    
    // protected $fillable = ['category_id','name', 'description','keywords','subcategory_id','store_code'];
    protected $fillable = ['category_id','name','model','brand','price','description','images','keywords','subcategory_id','store_code'];

    public function specs(){

        return $this->belongsToMany(Spec::class)->withPivot('value');

    }

    public function pivotValue(){

        return $this->belongsToMany(Spec::class);

    }

    public function addComment($body, $user_id, $product_id){

    Comment::create([
            'body' => $body,
            'user_id' => $user_id,
            'product_id' => $product_id
        ]);
    }

    public function comments(){
        return $this->HasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
   
    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

}


