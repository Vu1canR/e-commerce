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
		<section v-for="(spec,index) in specs">
			<div class="header">
				<h4>{{spec.spec_name}}</h4>
				<span class="reset"><button>reset</button></span>
			</div>
			<label v-for="value in spec.values" ><input type="checkbox" name="checkbox" @click="addSpec(value.id)" v-model="filters.specs[spec.spec_name]">{{value.value}} {{value.products.name}}</label>
			<!-- @click="addSpec(value.value)" -->
			<!-- <label><input type="checkbox" name="checkbox">MSI</label>
			<label><input type="checkbox" name="checkbox">Gigabyte</label>
			<label><input type="checkbox" name="checkbox">Asrock</label> -->
		</section>			
			<!-- <p>{{specs}}</p> -->
		<p v-bind="inconsole()"></p>
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
				specs: [],
				tags: []
			},
			test: [],
			temp:{'spec': 2, 'value': 4},
			test2:['Asus', '6gb']
		};
	},
	methods: {
		inconsole(){
			console.log(this.filters.specs);
		},

		addSpec(value, values){
			const temp = []
			// console.log(values);
			// console.log(value);
			this.filters.specs.push(value)
			
			// console.log(typeof(value))
		},

		loadSpecs() {


			axios.get('/api/specs', {
					params: this.temp
				})
				.then((response) => {
					this.specs = response.data;
					// console.log(response.data);
					this.specs.forEach(spec => {
						this.filters.specs.push(spec.spec_name)
					})
				})
				.catch(function (error) {
					// console.log(error);
				});
		},
	},

	created() {
		
		this.loadSpecs()
		for (let x in this.test2) {
			// this.test.push(this.specs)

		}
        // this.temp.forEach(spec => {
			// 	this.test.push(spec)
        // })
    },

    mounted() {
		
		
		// this.inconsole()
        // axios.get('/products').then(response => this.my_products = response.data);
    },

	watch: {
		filters: {
			handler: function () {
				// console.log(this.selected)
				// this.inconsole(_.omit(this.selected, 'categories'))
				// this.loadSpecs();
				// this.inconsole(_.omit(this.selected, 'categories'))
			},
			deep: true
		
		},
            
	},
};
</script>
