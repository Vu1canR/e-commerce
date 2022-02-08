<template>

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
		<section v-for="spec in specs">
			<div class="header">
				<h4>{{spec.property}}</h4>
				<span class="reset"><button>reset</button></span>
			</div>
			<label v-for="value in spec.values" ><input type="checkbox" name="checkbox" @click="addSpec(value.value)">{{value.value}} {{value.products[0].values.length}}</label>
			<!-- @click="addSpec(value.value)" -->
			<!-- <label><input type="checkbox" name="checkbox">MSI</label>
			<label><input type="checkbox" name="checkbox">Gigabyte</label>
			<label><input type="checkbox" name="checkbox">Asrock</label> -->
		</section>			
			<!-- <p v-bind="inconsole()"></p> -->\
			<!-- <p>{{specs}}</p> -->
	</div>
	
</template>
<script>
export default {
	props:{
		// specs: {}
	},
	data() {
		return {
			specs:{},
			message: '',
			filters:{
				specs: ['8gb', 'TUF Gaming'],
				tags: []
			} 
		};
	},
	methods: {
		inconsole(){
			console.log(this.specs[0])
		},

		addSpec(value){
			this.filters.specs.push(value)
		},

		loadSpecs() {
			axios.get('/api/specs', {
					params: this.filters
				})
				.then((response) => {
					this.specs = response.data;
					console.log(response.data)
					// console.log(response.data[0].values[1].products[0].values);
				})
				.catch(function (error) {
					// console.log(error);
				});
		},
	},

	created() {
        // this.specs.forEach(spec => {
			// this.filters.specs.push(spec.id)
        // })
    },

    mounted() {
		this.loadSpecs()
		// this.inconsole()
        // axios.get('/products').then(response => this.my_products = response.data);
    },

	watch: {
		filters: {
			handler: function () {
				// console.log(this.selected)
				// this.inconsole(_.omit(this.selected, 'categories'))
				this.loadSpecs();
				// this.inconsole(_.omit(this.selected, 'categories'))
			},
			deep: true
		
		},
            
	},
};
</script>
