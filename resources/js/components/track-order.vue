<template>
    <div class="orders">
        <div class="wrap">
            <div class="search">
                <input v-model="search" type="text" class="searchTerm" placeholder="What are you looking for?">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div v-for="order in filteredList" class="order-div">
            <div>
                <p>№ {{order.id}}</p>
                <table>
                    <tr class="row">
                        <th class="thead">User Id</th>
                        <th class="thead">Address</th>
                        <th class="thead">Delivered</th>
                    </tr>
                        <tr class="row">
                            <td>{{order.user_id}}</td>
                            <td>{{order.address}}</td>
                            <td>{{order.is_delivered}}</td>
                        </tr>
                </table>
                <div class="btn-div">
                    <button class="ep-btn"><a href="#">Details</a></button>
                    <form :action="'/track/' + order.id" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" :value="csrf">
                    <button class="ep-btn" type="submit">Confirm</button>
                    </form>
                    <!-- <button class="od-btn" @click="getId(order.id)">Cancel</button> -->
                    
                </div>
                <div style="clear: both;"></div>	
            </div>
            
        </div>
    </div>
</template>
<script>
export default {
    
    props:{
        orders: {},
        // message: ''
    },

  	data() {
    	return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            search: '',
            my_r: [1, 2]
		}
    },
    methods: {
        inConsole(){
            console.log(typeof(this.my_r))
        },
        isSuccess() {
        //    alert(this.message)
        }
    },
    computed: {
        filteredList(){
            return this.orders.filter(order => {
                return String(order.id).includes(this.search)
            })
        }
        
    }

};

</script>
