<template>
<div>
	<h1 v-bind="inConsole()"></h1>
	<p v-for="data in products" v-text="data" :key="data.id"></p>
</div>
</template>
<script>
export default {
	props:{
		products: {}
	},
	data() {
		return {
			message: 'Da fuk'
		};
	},
	methods: {
		inConsole(){
			console.log(this.products)
		}
	},
};
</script>
