@extends('layouts')


@section('content')
	<div class="col-md-8 blog-main">
    	<h1>{{ $post->title }}</h1>
    	{{ $post->body }}
	    <div class="commets">
	    	<hr>
	    	<ul class="list-group">
			    @foreach($post->comments as $comment)
			    	<li class="list-group-item">
			    		<strong>
			    			{{$comment->created_at->diffForHumans()}}: &nbsp;
			    		</strong>
			    		{{$comment->body}}
			    	</li>
			    	
			    @endforeach 
			</ul>
	    </div>	
	    <hr>
	    <div class="card">
	    	<div class="card-body">
	    		<ul class="list-group">
	    		<form method="POST" action="/posts/{{ $post->id }}/comments">
	    			{{csrf_field()}}
	    			<div class="form-group">
	    				<textarea name="body" class="form-control" placeholder="Your comment" required></textarea>
	    			</div>
	    			<div class="form-group">
	    				<button type="submit" class="btn btn-primary ">Add comment</button>
	    			</div>
	    			
	    		</form>
	    		</ul>
	    	</div>
	    </div>


    </div>	


@endsection('section')