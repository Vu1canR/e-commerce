window.Time = new Vue();

Vue.component('base-input', {
	inheritAttrs: false,
	props: ['label', 'value'],
	computed: {
	  inputListeners: function () {
		var vm = this
		// `Object.assign` merges objects together to form a new object
		return Object.assign({},
		  // We add all the listeners from the parent
		  this.$listeners,
		  // Then we can add custom listeners or override the
		  // behavior of some listeners.
		  {
			// This ensures that the component works with v-model
			input: function (event) {
			  vm.$emit('input', event.target.value)
			}
		  }
		)
	  }
	},
	template: `
	  <label>
		{{ label }}
		<input
		  v-bind="$attrs"
		  v-bind:value="value"
		  v-on="inputListeners"
		>
	  </label>
	`
  })

Vue.component('coupon', {

	
	template: '<input placeholder="Enter your coupon" @blur="onCouponApplied()">',
	methods:{

		onCouponApplied(){
				this.$emit('applied');
			}
		}	
	});

var ex = new Vue({
	el:'#app',

	data:{
		isChecked: '',
		lovingVue: '',
		couponApplied : false,
		title: 'Time consuming',
		myarray: ['apple', 'potato', 'banana', 'carrot'],
		myinput: 'Banana',
		switchMode: false,
		mytext: '',
		cart: ['apple', 'potato', 'banana', 'carrot'],
		displayCheckout: false,
		total: 0
	},

	methods:{
		status() {
			
			console.log(this.isChecked)
			
		  },
		  
		  isCouponApplied(){
			alert('Already applied')
		},
		
		result(){
			console.log('catching text')
		},

		isEmpty() {
			return this.cart.length;
		  }

		
	},
	
	created(){

		Time.$on('applied', () => alert('In progress'))

	},
	computed:{
		filteredList() {
            return this.myarray.filter(product => {
                    answer = product.toLowerCase().includes(this.myinput.toLowerCase())
              if (answer==true){
                return answer
              }
              else {
                // console.log(answer)
              }
            })
        }
	}
	
	
	
});
















// Vue.component('tabs', {

	
// template: `
// 	<div>
// 		<div class="tabs">
// 			<ul>
// 				<li v-for="tab in tabs" :class="is-active: tab.selected'}">
// 					<a href="#">{{tab.name}}</a>
// 				</li>
				
// 			</ul>
// 		</div>	
// 		<div class="tabs-detail">
// 			<slot></slot>
// 		</div>
// 	</div>	
// 		`
// 	, 
// data(){
// 	return{tabs:[]};
// },
// created(){

// 	this.tabs = this.$children;
// }


// });


// Vue.component('tab', {

	
// template: `
	
// 	<div><slot></slot></div>

// 		`,
// 		props:{
// 			name: {required: true},
// 			selected:{default: false}
// 		}

// });