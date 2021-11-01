<template>

    <div class="items-list">
        <div v-for="(product, index) in products" :key="product.id" class="product-div">
            <a :href="'/p/'+ product.store_code + '-' + product.name.replace(/ /g,'-').toLowerCase()" style="text-decoration:none; color:black;">
                <div class="content">
                    <img class="item-photo" images :src="'/images/' + product.sub_category_id + '/' + product.images.split('|')[0]">
                    <div class="rate"><a href="">&#9734;&#9733;</a></div>
                    <ul class="specs">
                        <li v-for="line in product.description.split('\n')" v-text="line"></li>
                    </ul>
                    <div class="price-cart">
                        <strong>{{product.price}}TJS</strong>
                        <!-- <div class="exp">
                            <div class="cart"><button class="to-cart" title="Add to cart" @click.stop.prevent="addItem(product)"><i class="fas fa-shopping-cart"></i></button></div>
                            <div class="compare-div"><button title="Add to comparison"><i class="fas fa-balance-scale"></i></button></div>
            
                            
                        </div> -->
            
                    </div> 
                </div>                   
            </a>    
        </div>
        
        
    </div>
 

</template>
<script>
export default {
    props: {
        products:{
            required:true
        }
    }
    ,
    data() {
        return {
            title: 'My mind hurts',
            my_products: '',
            my_message: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            my_array : []
        }
    },
    methods: {
        inConsole(){
            console.log(this.my_array)
        },
        
        addItem(product) {
            this.$root.$emit("addProduct", {
                store_code: product["store_code"],
                name: product["name"],
                quantity: this.quantity,
                price: product["price"]
            });
        },
        displayProducts() {
            console.log(this.my_products)
        },
        
        sendID(id){
            axios({
                method: 'post',
                url: '/c4/gpus',
                data: {
                category_id: id,    
                }
            })
            .then(response => console.log(response)) 
            .catch(error => console.log(error));
        }

    },
    mounted() {

        axios.get('/products').then(response => this.my_products = response.data);
    },
}
</script>
<style>
</style>