<template>
<div class="main-body">
	<tabs v-model="active">
	<!-- <tabs :uri="'/profile/' + user.id"> -->
		<tab title="profile">
			<div class="profile-info">
				<div><img class="profile-pic" :src="'/images/profile-pictures/' + user.picture" height="100" width="100" style="border-radius: 50%;" alt="profile-pic"></div>
				<ul class="user-info">
					
					<li><span class="uikey">Name</span> <span class="uivalue">{{user.name}}</span></li>
					<li><span class="uikey">Date of birth</span> <span class="uivalue">{{user.birth_date}}</span></li>
					<li><span class="uikey">Gender</span> <span class="uivalue">{{user.gender}}</span></li>
					
				</ul>
			</div>
		</tab>
		<tab title="orders" id="orders">
			<div class="orders">
				<div v-for="order in orders" class="order-div">
					<div>
						<p>№ {{order.id}} &nbsp;
							<span v-if="order.is_delivered == 1" style="color: green">Delivered</span>
							<span v-else-if="order.is_delivered == 0 && order.status == 1" style="color: grey">Canceled</span>
							<span v-else style="color: red">In progress</span>
						</p>
						<table>
							<tr class="row">
								<th class="thead">Store code</th>
								<th class="thead">Name</th>
								<th class="thead">Quantity</th>
								<th class="thead">Price</th>
								<th class="thead">Subtotal</th>
							</tr>
								<tr v-for="row in order.products_list" class="row">
									<td>{{row.store_code}}</td>
									<td class="p-name">{{row.product_name}}</td>
									<td>{{row.quantity}}</td>
									<td>{{row.price}}</td>
									<td>{{row.quantity*row.price}}</td>
								</tr>
						</table>
						<div class="btn-div">
							<button class="od-btn"><a href="#">Details</a></button>
							<form :action="'/profile/' + order.id" method="POST">
							<input type="hidden" name="_token" :value="csrf">
							<button v-if="order.is_delivered == 0" class="od-btn" type="submit" @click="getId()">Cancel</button>
							</form>
							<!-- <button class="od-btn" @click="getId(order.id)">Cancel</button> -->
							
						</div>
						<div style="clear: both;"></div>		
					</div>
					
				</div>
			</div>
		</tab>
	</tabs>

	</div>
</template>
<script>

import cart from "./cart";
import tab from "./tab";
import tabs from "./tabs";
import { ref } from "vue";

export default {

	name: "user-profile",

    components: {
        cart, tab, tabs
    },

	 setup() {
        const active = ref(0);

        return { active };
    },
	
	props:{
		orders: {}
	},
	data() {
		return {
			user: window.laravel.auth,
			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
		};
	},
	methods: {
		inConsole(){
			console.log('asdfsad')
		},
		getId() {
			// url = 
            axios({
                method: "post",
                url: "/profile/{orderId}",
                data: {
                    // orderId: orderId
                }
            })
                .then(response => console.log(response))
                .catch(error => console.log(error));
        }
	},
};
</script>
