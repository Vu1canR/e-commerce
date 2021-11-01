<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/home-page.css" type="text/css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Cuprum|Fira+Sans+Extra+Condensed&display=swap" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>x-kom.tj - Магазин компьютеров</title>

</head>
<body>

<div id="app">

@include('nav')
	
	
	<div class="main-body">
		<slider></slider>

		<br>
		
		<!-- <div class="interesting">
			<p>Maybe interesting for you</p>
		</div>
		<div class="top-month">
			<p>Top selling this month</p>
		</div> -->
		<p>Bestsellers</p>
		<bestsellers :products="{{$products}}"></bestsellers>
		<hr style="background-color: lightgray;">
		<p>New</p>
		<recently_added :products="{{$recent}}"></recently_added>
		<br>
		<br>
		
		<div class="history">
			<div>
				<img class="history-photo" src="{{asset('images\New folder\GoPro Hero7 Black Special kit\pr_2019_11_13_10_31_10_821_00.jpg')}}">
			</div>
			<div>
				<img class="history-photo" src="{{asset('images\New folder\GoPro Hero7 Black Special kit\pr_2019_11_13_10_31_18_444_03.jpg')}}">
			</div>
			<div>
				<img class="history-photo" src="{{asset('images\New folder\GoPro Hero7 Black Special kit\pr_2019_11_13_10_31_10_821_00.jpg')}}">
			</div>
			<div>
				<img class="history-photo" src="{{asset('images\New folder\GoPro Hero7 Black Special kit\pr_2019_11_13_10_31_18_444_03.jpg')}}">
			</div>
			
			
			<button class="h-prev"><i class="fa fa-chevron-left"></i></button>
			<button class="h-next" id="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
		
		</div>
		
	</div>
	
	
	@include('footer')
</div>
@include('scripts')


<!-- -------------------------------Script---------------------------------------------->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>

var slides = document.getElementsByClassName("slide");

</script>

</body>
</html>
