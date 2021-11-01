<script>
window.laravel = {!! json_encode([
			'csrf' => csrf_token(),
			'auth' => Auth::User()
		]); !!}
</script> 

<!-- <script src="https://unpkg.com/vue@next"></script> -->
<!-- <script src="https://unpkg.com/vue@3.2.19/dist/vue.global.js"></script> -->

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>


<script>
	var colors = ['#1a1a1a', '#303030', '#464646', '#555555', '#666666', '#777777', '#808080', '#888888', '#999999'];
	const container = document.getElementById('nav-ul');
	const list_item = document.getElementsByClassName('nav-list');
	const list_length = list_item.length;

	for(let i = 0; i < list_length; i++){
			
			list_item[i].style.background = colors[i];
		
		}

</script>