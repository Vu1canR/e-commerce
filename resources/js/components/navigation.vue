<template>
<div class="overlay" v-show="showModal"></div>
<span id="timer"></span>
<div class="cat-nav">
	
	<div :class="showModal ? 'navbar fixed' : 'navbar'" id="navigation">
		<ul id="nav-ul" @mouseover="darkenBody()" @mouseleave="lightenBody()">

			<li class="nav-list" v-for="(category,index) in my_array" :key="index"  >
				<a class="cat-link" :href="'/c/' + category.name.replace(/ /g,'-').toLowerCase()">
				<i :class="icons[index]" aria-hidden="false"></i>
				<span v-if="index != 6"><span>{{category.name.split(" ")[0]}}</span>{{category.name.split(" ")[1]}} {{category.name.split(" ")[2]}}</span>
				<span v-else><span>{{category.name.split(" ")[0]}} {{category.name.split(" ")[1]}}</span> {{category.name.split(" ")[2]}} {{category.name.split(" ")[3]}}</span>
				<i class="fas fa-caret-down" aria-hidden="true"></i>
				</a>
				<div class="cat-drdown-div">
					<div>
						<div class="cat-inside">Categories:</div>
						<ul class="dd-ul">
							<li class="dd-list" v-for="subcategory in category.subcategories">
								<a :href="'/c-4/'+ subcategory.id + '-' +subcategory.name.replace(/ /g,'-').toLowerCase()">{{subcategory.name}}<i class="fas fa-angle-right" aria-hidden="true"></i></a>
							</li>
						</ul>
					</div>	
				</div>
			</li>
		</ul>	
		
	</div>
	<div class="dummy" v-show="showModal"></div>
	<!-- <p v-bind="inConsole()"></p> -->
	
</div>


</template>
<script>
export default {
	props:{

	},
	data() {
		return {
			showModal: false,
			hovered: false,
			icons: [
				"fa fa-laptop fa-2x",
				"fas fa-mobile-alt fa-2x",
				"fa fa-desktop fa-2x",
				"far fa-hdd fa-2x",
				"fas fa-desktop fa-2x",
				"fas fa-gamepad fa-2x",
				"fa fa-tv fa-2x",
				"fas fa-compact-disc fa-2x",
				"fas fa-headphones-alt fa-2x"
			],
			timer: 0,
			// categories: [
			// 	"Laptops and tablets",
			// 	"Smartphones and accessories",
			// 	"Desktops",
			// 	"Computer parts",
			// 	"Peripherals",
			// 	"Gaming",
			// 	"Photo TV and audio",
			// 	"Software",
			// 	"Accessories",
			// 	],
			my_array: [{"id":1,"name":"Laptops and tablets","subcategories":[{"id":4,"name":"Laptops\/Notebooks\/Ultrabooks","category_id":1},{"id":5,"name":"Tablets","category_id":1},{"id":6,"name":"2-in-1 laptops","category_id":1},{"id":9,"name":"Bags and cases","category_id":1},{"id":10,"name":"Laptop accessories","category_id":1}]},{"id":2,"name":"Smartphones and accessories","subcategories":[{"id":11,"name":"Smartphones and telephones","category_id":2},{"id":12,"name":"Smartwatches","category_id":2},{"id":13,"name":"Flash memory","category_id":2},{"id":14,"name":"Accessories","category_id":2}]},{"id":3,"name":"Desktops","subcategories":[{"id":15,"name":"Gaming PC","category_id":3},{"id":16,"name":"Office PC","category_id":3},{"id":17,"name":"Servers","category_id":3}]},{"id":4,"name":"Computer parts","subcategories":[{"id":1,"name":"Graphics card","category_id":4},{"id":2,"name":"Processor","category_id":4},{"id":3,"name":"Motherboard","category_id":4},{"id":18,"name":"RAM","category_id":4},{"id":19,"name":"CPU Cooler","category_id":4},{"id":20,"name":"Fans","category_id":4},{"id":21,"name":"HDD and SSD","category_id":4}]},{"id":5,"name":"Monitors","subcategories":[{"id":22,"name":"Full HD","category_id":5},{"id":23,"name":"Quad HD","category_id":5},{"id":24,"name":"Ultra HD","category_id":5}]},{"id":6,"name":"Gaming","subcategories":[{"id":7,"name":"Consoles","category_id":6},{"id":8,"name":"Console Games","category_id":6}]},{"id":7,"name":"Photo TV and audio","subcategories":[{"id":25,"name":"TVs","category_id":7},{"id":26,"name":"Projectors","category_id":7},{"id":27,"name":"Home theater","category_id":7}]},{"id":8,"name":"Software","subcategories":[]},{"id":9,"name":"Accessories","subcategories":[]}]
		};
	},
	methods: {
		inConsole(){
			// console.log(this.showModal + ' modal')
			console.log(this.darkenBody())
		},
		darkenBody(){
			// var timeBegan = null, timeStopped = null    , stoppedDuration = 0, started = null;
			// var startTime = new Date()
			// var timeElapsed = new Date(startTime - timeBegan - stoppedDuration)
			// var endTime = new Date()
			// var milliseconds = 0
			// var sec = timeElapsed.getUTCSeconds()
	
			// var timeElapsed = new Date(currentTime - timeBegan - stoppedDuration)
			// console.log(currentTime.getUTCSeconds())
			// console.log(timeElapsed.getMilliseconds())

			// if (startTime.getMilliseconds() >= 700){
				// setTimeout(() => this.showModal = true, 400);
			// }

			// var initial = 30000;
			// var count = initial;
			// var counter; //10 will  run it every 100th of a second

			// function timer() {
			// 	if (count <= 0) {
			// 		clearInterval(counter);
			// 		return;
			// 	}
			// 	count--;
			// 	displayCount(count);
			// }

			// function displayCount(count) {
			// 	var res = count / 100;
			// 	return res.toPrecision(count.toString().length)
			// }
			// counter = setInterval(timer, 10);
			// console.log(counter)

			var startTime = Date.now();
			var counter = interval;
			var interval = setInterval(function() {
				var elapsedTime = Date.now() - startTime;
				counter = (elapsedTime / 1000).toFixed(3);
				// document.getElementById("timer").innerHTML = (elapsedTime / 1000).toFixed(3);
			}, 50);

			// console.log(counter)

        },
		lightenBody(){
			// var self = this
			this.showModal = false
		// 	window.addEventListener('mouseover', function(e){
		// 		// console.log(e.target)
		// 	if (!e.target.classList.contains('nav-ul'))
		// 	{
		// 		// self.close()
		// 		console.log('no')
				
		// 		console.log(this.showModal)
		// 	}
		// }, true)

        },
	},
};
</script>
