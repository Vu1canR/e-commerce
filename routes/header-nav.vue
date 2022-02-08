<template>
<div class="header">
	<div class="menu-bar">
		<div class="logo">
			<a href="/welcome"><img src="/images/logo-color-tagline.svg" id="logo" width="262" height="42"></a>
		</div>
		<div class="wrap">
		   <search></search>
		</div>
			<div class="contacts">
			   <ul>
			   	<li>
			   		<i class="fa fa-phone-alt" aria-hidden="true"></i>
			   		<a href="#">919 29 30 73</a></li>
			   	<li>
			   		<i class="fas fa-at" aria-hidden="true"></i>
			   		<a href="#"> Email us</a></li>
			   	<li>
			   		<i class="fa fa-map-marker" aria-hidden="true"></i>
			   		<a href="#">Location</a></li>
			   </ul>
			</div>

		<div class="header-right">
			<div class="auth" id="auth">
				
				
				
				<div v-if="user == null">
					<div class="icon user-icon">
						<i class="fa fa-user-plus" aria-hidden="true"></i>
					</div>
					<div class="auth-text text">Log in</div>
					<div class="dropdown-content">
						<a class="auth-button" href="/login">Log in</a> 
						<a class="auth-button" href="/register">Register</a>
					</div>
				
				</div>
				<div v-else>
					<div class="icon user-icon">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div>

					<div class="auth-text text">{{user.name}}</div>
					<div class="dropdown-content">
						<a class="auth-button" :href="'/profile/'+ user.id +'#profile'">My profile</a> 

						<a class="auth-button" :href="'/profile/' + user.id + '#orders'">My Orders</a> 
						<form method="GET" action="/logout">
							<a class="auth-button" href="/logout">Log out</a>
						</form>
						
					</div>
				</div>	
			</div>
			<div class="header-wrapper">
				<cart></cart>
			</div>		
			
		</div>
	</div>
</div>

</template>
<script>

import search from './search.vue'
import cart from './cart.vue'

export default {
	props:{

	},

	components:{search, cart},
	data() {
		return {
			user: window.laravel.auth,
		};
	},
	methods: {
		
	},
};
</script>
