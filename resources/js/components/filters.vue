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
			<div v-for="value in spec.values">
				<!-- <label><input type="checkbox" name="checkbox" @click="addSpec(value.id, spec.values, spec, index)" :value="value.id" v-model="filters.specs">{{value.value}} {{value.products.name}} -->
				<label><input type="checkbox" name="checkbox" :value="value.id" v-model="filters[spec.spec_name]" @change="addSpec(spec ,index, value.id)">{{value.value}} {{value.products.name}}
				 	<span><span>{{value.products.length}}</span></span>
				 	<!-- <span v-else>{{value.products.reduce(function (sum, item) {return sum + item.values_count}, 0)}} </span> -->
				</label>
			</div>
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
		subcat_obj: {},
		specs_obj: {},
	},
	data() {
		return {
			selected_values: [],
			indexes_array: [],
			specs:{},
			message: '',
			filters:{
				// specs: [],
				// tags: []
			},

			temp: [],
			test2:['Asus', '6gb'],
			v: [],
			spec_index : null,
			selected_value: [],
			value_id: null,
			i: 0
		};
	},
	methods: {
		inconsole(){
			// console.log(this.filters);
		},

		addSpec(spec, spec_index, value_id){
			// this.selected = selected
			let temp_array = [];

			this.indexes_array[value_id] = spec_index
			this.selected_values[spec_index] = spec
			// this.temp[value_id] = temp_array


			this.value_id = value_id
			this.values = spec

			let x = this.indexes_array[value_id]

			// spec.values.forEach(item =>{
			// 	if(item.id != value_id && !this.v.includes(item.id)){
			// 		this.temp.push(item.id)
			// 	}
			// })

			// console.log(this.temp);

			// console.log(this.temp);
			// const index = this.temp.indexOf(value)


			// console.log(this.indexes_array[value_id]);
			



			this.loadSpecs()		
		},

		loadSpecs() {

			// if(!this.filters.specs.includes(this.value_id)){
			// 	delete this.selected_values[this.indexes_array[this.value_id]]
			// }
			// console.log(this.indexes_array[this.value_id]);

			// console.log(this.selected_values[this.indexes_array[this.value_id]]);
						// this.filters.forEach((item, key) => {
						// 	console.log(key);
						// });
				

			// console.log(Object.keys(this.filters).length > 0);

			

			// if(Object.keys(this.filters).length > 0){
				// for (let index = 0; index < Object.keys(this.filters).length; index++) {
					
				// 	console.log(Object.keys(index));
				// 	console.log('test');

				// }


			let i = null
			for (let index = 0; index < Object.keys(this.filters).length; index++) {
				if (this.filters[Object.keys(this.filters)[index]].length > 0) {
					i = this.filters[Object.keys(this.filters)[index]].length > 0
					// break
				}
			}
			console.log(i);

			if(i){
				Object.keys(this.filters).forEach((value, key) => {
					// console.log(key);
					axios.get('/api/specs', {
						params: _.omit(this.filters, value)
					}).then((response) => {
						this.specs[key] = response.data[key]

					})
				})

			}else{
				axios.get('/api/specs', {
					params: this.filters
				}).then((response) => {
						this.specs = response.data

					})
			}

		},
	},

	created() {
		
		for (let index = 0; index < this.specs_obj.length; index++) {
			this.filters[this.specs_obj[index].spec_name] = []
			
		}
		this.loadSpecs()
			// this.test.push(this.specs)

        // this.temp.forEach(spec => {
			// 	this.test.push(spec)
        // })
    },

    mounted() {

    },

	// watch: {
	// 	filters: {
	// 		handler: function () {
	// 			this.loadSpecs();
	// 		},
	// 		deep: true
		
	// 	},
            
	// },
	
	computed: {
		valuesCount(products){
			products.reduce(function (sum, item) {return sum + item.values.length}, 0)
		}
	},
};
</script>
