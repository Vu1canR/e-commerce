
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/products.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Cuprum|Fira+Sans+Extra+Condensed&display=swap" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>x-kom.tj - Магазин компьютеров</title>
	
</head>
<body style="background-color: white">
<div id="app">

@include('nav')


<br>
	<div class="main-body">
	<p>
		<a href="/welcome">x-kom</a> >
		<a href="/c/{{strtolower(str_replace(' ','-',$cat_obj->name))}}">{{$cat_obj->name}}</a> >
		<a href="/c-{{$cat_obj->id}}/{{$subcat_obj->id}}-{{strtolower(str_replace(' ','-',$subcat_obj->name))}}">{{$subcat_obj->name}}</a>
	</p>		
		<div class="main-filters">
			<div>
				Материнские платы
				<span>
				Материнские платы сокер ам4
				</span>
			</div>
			<section>
				<div class="header">
					<h2>Фильтры</h2>
					<span class="reset"><button>reset</button></span>
				</div>
				<div class="show-all">
					<button>Show all filters</button>
					<input type="text" class="filter-search" placeholder="Search...">
				</div>
			</section>	
			
			<section>
				<h4>Price</h4>
				<div>
					<div class="price-range">
						<input type="text" name="from" placeholder="from"> - <input type="text" name="to" placeholder="to">
					</div>	
				</div>	
			</section>	
			<section>
				<div class="header">
					<h4>Vendor</h4>
					<span class="reset"><button>reset</button></span>
				</div>
				<label><input type="checkbox" name="checkbox">Asus</label>
				<label><input type="checkbox" name="checkbox">MSI</label>
				<label><input type="checkbox" name="checkbox">Gigabyte</label>
				<label><input type="checkbox" name="checkbox">Asrock</label>
			</section>
			<section>
				<div class="header">
					<h4>Format</h4>
					<span class="reset"><button>reset</button></span>
				</div>
				<label><input type="checkbox" name="checkbox">ATX</label>
				<label><input type="checkbox" name="checkbox">mATX</label>
				<label><input type="checkbox" name="checkbox">mITX</label>
				<label><input type="checkbox" name="checkbox">uATX</label>
				<label><input type="checkbox" name="checkbox">E-ATX</label>
			</section>	
				

			<section></section>	
			
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
				
				<products_list :products="{{$products}}"></products_list>
			
				
				

		</div>
	</div>
	<br>
	@include('footer')
</div>
@include('scripts')
</body>
</html>
