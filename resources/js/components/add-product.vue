<template>
<div class="main-body" v-bind="inConsole()">
    <tabs>
	<!-- <tabs :uri="'/profile/' + user.id"> -->
		<tab name="New product" :selected="true">
        <div class="form-div">
            <form method="POST" action="/add" enctype="multipart/form-data">
            <!-- @submit.prevent="onSubmit()" -->
            <p>{{data['subcategories']}}</p>
     
            
    
            <input type="hidden" name="_token" :value="csrf" />
            <label for="name"><strong>Category</strong></label>
            <select name="category_id"  @change="getCatID($event.target.value)">
                <option 
                v-for="(category, index) in categories" 
                :key="index" 
                :value="category.id"
                :name="category.name">{{category.name}}</option>
            </select>

            <label for="name"><strong>Subcategory</strong></label>
            <select name="subcategory_id" @change="getSubCatID($event.target.value)">
                <option v-for="(subcat_id, subcat_name) in data['subcategories']"
                 :key="subcat_id"
                 :value="subcat_id"
                 :name="subcat_name">{{subcat_name}}</option>
                 
            </select>
			<label for="name"><strong>Name</strong></label>
			<input type="text" name="name" autocomplete="on">
			<label for="description"><strong>Description</strong></label>
			<textarea name="description" rows="10"></textarea>
            <br><br>
            <label for="images"><strong>Images</strong></label>
			<input type="file" name="images[]" autocomplete="off" multiple>
            <br><br>
            <label for="keywords"><strong>Keywords</strong></label>
			<input type="text" name="keywords" autocomplete="on">
            <label for="store_code"><strong>Store code</strong></label>
			<input type="text" name="store_code" autocomplete="on">
            
            
            
            <label v-for="(spec, index) in data['specs']" :for="spec" :key="index"><strong>{{spec}}</strong>
            <input type="text" :key="index" :name="spec" autocomplete="off">
            </label>
			<button class="add-btn" type="sumbit">Add product</button>
            
            
        </form>
        </div>
		</tab>
		<tab name="orders" id="orders">
            <div class="products">
                <div class="wrap">
                    <div class="search">
                        <input v-model="search" class="searchTerm" placeholder="What are you looking for?">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div v-for="(product, index) in filteredList" class="product-div">
                    <div>
                        <div class="name-row">№ {{product.name}} - {{product.quantity}} &nbsp; <input ref="qi" name="quantity" v-model="quantity" autocomplete="off"></div>
                        <div class="btn-div">
                            <button class="ep-btn"><a href="#">Details</a></button>
                            <form action="/add" method="POST">
                            <input type="hidden" name="_token" :value="csrf">
                            <button v-if="!showEdit[index].editing" @click.prevent="showInput(index)" class="ep-btn">Edit</button>
                            <button v-else @click.prevent="hideInput(product.id, product.quantity, index)" class="ep-btn">Save</button>
                            </form>
                            
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


export default {

    props: {
        categories: {
            required:true
        },
        products_object: {
            required: true
        }
    },
    data() {
        return {
            products: this.products_object,
            data: {
                specs: {60: "Color", 61: "OS"},
                subcategories: {"Laptops 17\"": 4, "Laptops 15\"": 5, "Tablets 10\"": 6}
            },
            quantity: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            search: '',
            editing: false,
            temp: {},
            x : 0,
            showEdit: [],
        }
    },
    methods: {
        inConsole(){
        },
        getCatID(field){
            this.category_id = field
            axios({
                method: 'post',
                url: '/category/id',
                data: {
                category_id: this.category_id,
                subcategory_id: ''
                }
            })
            .then(response => this.data = response.data)
            .catch(error => console.log(error));

        },
        getSubCatID(field){
                
            axios({
                method: 'post',
                url: '/category/id',
                data: {
                category_id: this.category_id,    
                subcategory_id: field
                }
            })
            .then(response => this.data.specs = response.data.sel_cat_specs) 
            .catch(error => console.log(error));
        },

        showInput(index){
            this.showEdit[index].editing = true
            this.$refs.qi[index].style.display = 'inline-block';
            
        },
        hideInput(productId, quanityQuantity, index){
            this.showEdit[index].editing = false
            this.$refs.qi[index].style.display = 'none';
            if(this.quantity != ''){
                alert('Quantity changed')
                axios({
                    method: "post",
                    url: "/add/product-update",
                    data: {
                        quantity: this.quantity,
                        id: productId
                    }
                })
                // .then(response => this.products[index].quantity = response.data.quantity, console.log(response.data.quantity))
                .then(function (response) {
                    console.log(response.data)
                })
                .catch(error => console.log(error));
            }    
        }

    },

    created() {
        this.products_object.forEach(product =>{
            this.showEdit.push({editing: false})
        })
    },

    mounted() {
        
        this.$refs.qi.forEach(input => {
           this.$refs.qi[this.x].style.display = 'none';
           this.x ++
        });
        
    },

    computed: {
        filteredList(){
            return this.products.filter(product => {
                return product.name.toLowerCase().includes(this.search.toLowerCase())
            })
        },


    },

}      
</script>

<style>

</style>