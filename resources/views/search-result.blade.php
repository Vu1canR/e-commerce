<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token() }}">
	<link rel="stylesheet" href="css/search.css" type="text/css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Cuprum|Fira+Sans+Extra+Condensed&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div id="app">
    @include('nav')
<br>
<div class="route-nav">x-kom>Компьютерные комплектующие></div>
<br>
	<div class="main-body">
		<div class="left">
			<ul class="cat-ul">
			@foreach($categories as $category)
			<!-- <p>{{$category->name}}</p> -->
				<li class="cat-list"> 
					<a class="cat-link" href="/c/{{strtolower(str_replace(' ','-',$category->name))}}">{{$category->name}}</a>
					
				</li>
			@endforeach    
			</ul>
		</div>
		  
		<div class="products-list">
			<div class="filter-view">
				<div>
					<ul id="view-options">
						<li><i class="fas fa-th-large"></i></li>	
						<li><i class="fas fa fa-th-list"></i></li>
						<li><i class="fas fa-list"></i></li>
					</ul>
				</div>
				<div>
					<select id="sort-by" name="sort-by">
						<option value="ascending">по возрастанию</option>
						<option value="descending">по убыванию</option>
						<option value="popularity">по популярности</option>
						<option value="a-z">название а-я</option>
						<option value="z-a">название я-а</option>
					</select>
				</div>
				<div class="page-nav">
					<a class="h-next"><</a>
					<input type="text" name="page" id="page" autocomplete="off">
					<a class="h-prev">></a>
				</div>
			</div>
			<!-- items list comes here -->
				<products-list :products="{{$result}}"></products-list>
		</div>
	</div>



	@include('footer')
</div>
@include('scripts')

</body>
</html>