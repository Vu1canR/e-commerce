<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{

	protected $fillable = ['product_id', 'body', 'user_id'];
    
public function post(){

		return $this->belongsTo(Post::class);

	} 
	
public function product(){

	return $this->belongsTo(Product::class);

}

public function user(){

	return $this->belongsTo(User::class);

}
// Sentry::getUser()->id
	

}
