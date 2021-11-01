<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/subcategories.css" type="text/css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Cuprum|Fira+Sans+Extra+Condensed&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>Categories</title>
    <style>
        
    </style>
</head>
<body>
<div id="app">
    @include('nav')
    <br>
    <div class="main-body">
    <p><a href="/welcome">x-kom</a>><a href="/c/{{strtolower(str_replace(' ','-',$chosen_category->name))}}">{{$chosen_category->name}}</a></p>
        <div class="left">
            <ul class="cat-ul">
            @foreach($categories as $category)
            <!-- <p>{{$category->name}}</p> -->
                <li class="cat-list"> 
                    @if($category->name == $chosen_category->name)
                    <strong >{{$category->name}}</strong>
                    @else
                        <a class="cat-link" href="/c/{{strtolower(str_replace(' ','-',$category->name))}}">{{$category->name}}</a>
                    @endif
                    <ul class="chosen-cat">
                    @if($category->name == $chosen_category->name)
                        @foreach($chosen_category->subcategories as $subcategory)
                            <li class="ccs-list"> <a class="ccsa" href="/c-{{$category->id}}/{{$subcategory->id}}-{{strtolower(str_replace(' ','-',$subcategory->name))}}">{{$subcategory->name}} <span>({{count($subcategory->amount)}})</span></a></li>
                        @endforeach    
                    @endif
                    </ul>
                </li>
            @endforeach    
            </ul>
  	    </div>

        <div class="right">
            <div class="categories">
                @foreach($chosen_category['subcategories'] as $subcategory)
                    <div class="sub-cat-list">
                        <a href="/c-4/{{$subcategory->id}}-{{strtolower(str_replace(' ','-',$subcategory->name))}}" style="text-decoration: none; color: black;">
                            <div>
                            <div>
                                <img class="cat-pic" src="{{ asset('images/profile-pictures/dragon.png') }}" alt="picture" height="60" width="60"></div>
                                <br>
                                {{$subcategory['name']}} ({{count($subcategory['amount'])}})
                            </div>
                            <div class="amount"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
        
    </div>
    @include('footer')
</div>
@include('scripts')
</body>
</html>