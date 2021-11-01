<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Comment;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{

	public function store($storeCode, Product $product){
		try{

			$userId = Auth::id();
			$product->addComment(request('body'), $userId, $product->id);
		}
		catch(Exception $e){
			$e->getMessage();
		}

		return back();
	}

	public function update(Request $request){
		$comment = Comment::find($request->id);
		$comment->body = $request->body;
		$comment->save();
		$body = $comment->body;
		$id = $request->id;
		
        return compact('body', 'id');
	}

}
