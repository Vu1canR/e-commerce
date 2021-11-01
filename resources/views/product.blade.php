<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/product.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Cuprum|Fira+Sans+Extra+Condensed&display=swap" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>x-kom.tj - Магазин компьютеров</title>

<head>
<body>
<div id="app">
    @include('nav')
    <br>
    <p>
        <a href="/welcome">x-kom</a> >
        <a href="/c/{{strtolower(str_replace(' ','-',$cat_obj->name))}}">{{$cat_obj->name}}</a> >
        <a href="/c-{{$cat_obj->id}}/{{$subcat_obj->id}}-{{strtolower(str_replace(' ','-',$subcat_obj->name))}}">{{$subcat_obj->name}}</a>
        <!-- <a href="/p/{{$subcat_obj->id}}-{{strtolower(str_replace(' ','-',$product_object->name))}}">{{$product_object->name}}</a> -->
    </p>
    <!-- <br> -->
        <product :product_object="{{$product_object}}" :product_comments="{{$comments}}"></product>
    <br><br>
    @include('footer')
</div>




@include('scripts')
    

</body>



</html>
