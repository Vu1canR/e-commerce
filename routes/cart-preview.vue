<template>
<div class="main-body">
	<form action="/cart">
		<div class="table-div">
			<table>
				<tr class="row">
					<th class="thead">Store code</th>
					<th class="thead">Name</th>
					<th class="thead">Quantity</th>
					<th class="thead">Price</th>
					<th class="thead">Subtotal</th>
				</tr>
				<tr class="row" v-for="(row, index) in cart" :key="index">
					<td v-text="row.store_code"></td>
					<td v-text="row.name" class="p-name"></td>
					<td>
						<input type="number" size="1" :value="row.quantity" @blur="updateQuantity($event.target.value, index)">
					</td>
					<td v-text="row.price + ' TJS'"></td>
					<td v-text="row.quantity*row.price +' TJS'"></td>
					<!-- <td v-for="item in row" v-if="item == quantity">
						
						<input type="text" size="1" v-text="row.quantity">
					</td>
					<td v-else>{{item}}</td>
					<td v-text="cart.quanity*cart.price +' TJS'"></td> -->
					<td><i @click="delItem(index)" class="far fa-trash-alt del"></i></td>
				</tr>
				<tr >
					<!-- <td></td><td></td><td></td> -->
					<td class="lr-td"></td>
					<td class="lr-td"></td>
					<td class="lr-td"></td>
					<td class="lr-td">Total: </td>
					<td v-text="total +' TJS'" class="lr-td"></td>
					<td class="lr-td"><i @click="rotate=!rotate" :class="rotate ? 'fas fa-sync-alt ref':'fas fa-sync-alt ref-rot'"></i></td>
				</tr>
			</table>
			<button type="submit" class="subm" @click.prevent="sendCart()">Place order</button>
		</div>
	</form>	  
</div>	
</template>

<script>

// import cart from "./cart";

export default {
  name: "cart-preview",
    components: {
        // cart
	},
	props:{
		// user_id:{required:true}
	},

  data() {
    return {
		cart: [],
		quantity: '',
		csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
		rotate: true,
		my_array: [],
		total: 0

    };
  },
  	methods: {
	
	inConsole(){
		this.cart
	},

	updateQuantity(value, index){
		this.my_array = [value, index] 
		this.emitter.emit("updateQuantity", this.my_array)
		this.cart[index].quantity = value
		
		this.toLocal()
		this.totalPrice()
	},

	toLocal(){
		let stringifiedArray = JSON.stringify(this.cart);
		localStorage.setItem("cart", stringifiedArray);
	},

	totalPrice(){
		let tempPrice = 0
	
		JSON.parse(localStorage.getItem("cart")).forEach(row => {
			tempPrice += row.price*row.quantity
		});
			this.total = tempPrice
			// console.log(this.totalAmount)
	// return typeof(JSON.parse(localStorage.getItem("cart")))

		// for (let index = 0; index < this.cart.length; index++) {
		// 		tempPrice += this.cart[index].price
		// 		console.log(tempPrice)
				
		// 	}
		// 	this.total = tempPrice
			
	},

	refCart(tag){
		tag.style.transform = "rotate(180eg)";
		tag.style.transition = "0.4s"

	},
	
	delItem(item){
		this.emitter.emit("delProduct", item);
		this.cart.splice(item, 1);
	},
	
	sendCart(){
			
            axios({
                method: 'post',
                url: '/cart',
                data: {
				cart: JSON.stringify(this.cart)
				
                }
            })
            .then(response => alert('Placing order'))
				// location.href = "/cart";
			 
            .catch(error => console.log(error));
		}	
	},
	  
	created() {
		if (localStorage.getItem("cart") != null)
		this.cart = JSON.parse(localStorage.getItem("cart"));
		this.totalPrice()
	},
	
	watch:{
		cart(val){
			// console.log('Value changed')
			this.toLocal()
			this.totalPrice()
		}
	}
};
</script>

<style>


</style>
