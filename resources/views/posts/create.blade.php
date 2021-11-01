@extends('layouts')




@section('content')
    
    <div class="col-md-8 blog-main">

        <h1>Create a post </h1>

        <form method="POST" action="/posts">
            {{csrf_field() }}

          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
            
          </div>

          <div class="form-group">
            <label for="title">Body:</label>
            <textarea id="body" name="body" class="form-control"></textarea>
            
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary">Publish</button>
          </div>
          
              
              <div class="alert error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>
                    @endforeach
                </ul>
             </div>

            
        

        </form>




    </div>






@endsection('content')