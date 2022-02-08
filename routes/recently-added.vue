<template>
	<div class="recenly-added">
		<div v-for="product in products" :key="product.id" class="product-div">
			<a :href="'/p/'+ product.store_code + '-' + product.name.replace(/ /g,'-').toLowerCase()">
				<div class="pro-image">
					<img class="item-photo" images :src="'/images/' + product.sub_category_id + '/' + product.images.split('|')[0]">
				</div>
				<div class="pro-name">{{product.name}}</div>
				<div class="price-cart">
					<div class="price">{{product.price}}TJS</div>
					<div class="to-cart"><button @click.stop.prevent="addItem(product)"><i class="fas fa-shopping-cart"></i></button></div>
				</div>
			</a>
		</div>
	</div>
</template>
<script>
export default {
	props:{
		products: {}
	},
	data() {
		return {
			
		};
	},
	methods: {
		inConsole(){
			console.log(this.products)
		},
		addItem(product) {
            this.$root.$emit("addProduct", {
                store_code: product["store_code"],
                name: product["name"],
                quantity: 1,
                price: product["price"]
            });
        },
	},
};
</script>
