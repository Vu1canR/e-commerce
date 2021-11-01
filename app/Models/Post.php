<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function comments(){

		return $this->hasMany(Comment::class);

	} 

	public function addComment($body){

		
		$this->comments()->create(compact('body'));
		// Comment::create([
		// 'body' => $body,
		// 'post_id' => $this->id	
		// ]);

	}

}
