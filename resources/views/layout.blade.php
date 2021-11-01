
@yield('stylesheet')


<body style="background-color: white">
<div id="app" @click="hideSearchBar($event)">

include('nav')

@yield('body')


</div>


include('footer')