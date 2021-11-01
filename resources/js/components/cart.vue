<template>
    <div>
        <a href="/cart">
            <div class="icon shopping-cart">
                <i class="fa fa-shopping-cart"></i>
                <span class="counter" v-show="isEmpty" v-text="isEmpty"></span>
            </div>
            <div class="text">Cart</div>
        </a>
        <!-- <p v-text="inConsole()"></p> -->
    </div>
</template>

<script>

export default {
    name: "cart",

    data() {
        return {
            displayCart: false,
            cart: [],
            length: 0,
            temp: {
                // 'name': '',
                // 'quantity': '',
                // 'price': '',
            }
        };
    },
    methods: {
        inConsole(){
            console.log(this.cart)
            
        },

        toLocal(){
            let stringifiedArray = JSON.stringify(this.cart);
            localStorage.setItem("cart", stringifiedArray);
            
        }
        
    },
    created() {
        
        if (localStorage.getItem("cart") != null)
            this.cart = JSON.parse(localStorage.getItem("cart"));

    },
    mounted() {
        this.emitter.on("updateQuantity", my_array => {
            console.log(my_array)
            this.cart[my_array[1]].quantity = my_array[0]
            this.toLocal()
        });

        this.emitter.on("addProduct", product => {
            console.log(product)

            if (localStorage.getItem("cart") != null){
                this.cart = JSON.parse(localStorage.getItem("cart"));
            }
            this.cart.push(product);
            this.toLocal()
        });

        this.emitter.on("delProduct", item => {
            this.cart.splice(item, 1);
            this.toLocal()
        });
    },
    computed: {
        isEmpty() {
            return this.cart.length;
        },

    },
    watch: {
        cart(newVal, oldVal) {
            var stringifiedArray = JSON.stringify(newVal);
            localStorage.setItem("cart", stringifiedArray);
        }
    }
};
</script>

<style></style>
