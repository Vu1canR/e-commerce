<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="app">
        @include('nav')
        
        @yield('content')
        
        @include('footer')
    </div>
    @include('scripts')
</body>
</html>