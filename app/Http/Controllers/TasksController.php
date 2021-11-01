<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Task;

class TasksController extends Controller
{
    
	public function index(){	
	$tasks = Task::all();

  	return view('about', compact('tasks'));
  	}
    
    public function show(Task $task){	
	
	return view('tasks.show', compact('task'));

	  }
	
	// public function store(){
	// 	$id = Auth::id();
	// 	Comment::create([
	// 		'body' => request('body'),
	// 		'post_id' => 2,
	// 		"user_id" => $id,

	// 	]);

	// 	return back();
	// }
}
