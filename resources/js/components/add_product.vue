<template>
<div class="main-body">
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor"
                            d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z" />
                    </svg>
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" /></svg>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-list-item active">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-shopping-bag">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <path d="M16 10a4 4 0 0 1-8 0" /></svg>
                        <span>Products</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-pie-chart">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
                            <path d="M22 12A10 10 0 0 0 12 2v10z" /></svg>
                        <span>Statistics</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-inbox">
                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12" />
                            <path
                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
                            </svg>
                        <span>Inbox</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
                        <span>Notifications</span>
                    </a>
                </li>
            </ul>
            <div class="account-info">
                <div class="account-info-picture">
                    <img src="https://images.unsplash.com/photo-1527736947477-2790e28f3443?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE2fHx3b21hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                        alt="Account">
                </div>
                <div class="account-info-name">Monica G.</div>
                <button class="account-info-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-more-horizontal">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="19" cy="12" r="1" />
                        <circle cx="5" cy="12" r="1" /></svg>
                </button>
            </div>
        </div>
		<div class="add-div" title="new product">
            <div class="form-div menu">
                <form method="POST" action="/admin/products" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="csrf" />
                    <label for="name">Category</label>
                    <select name="category_id"  @click="getSub(index)" v-model="selected.category">
                    
                        <option 
                        v-for="(category, index) in categories" 
                        :key="index" 
                        :value="category.id"
                        :name="category.name">{{category.name}}</option>
                    </select>

                    <label for="name">Subcategory</label>
                    <select name="subcategory_id" @click="getCat()" v-model="selected.subcategory">
                        <option v-for="subcategory in subcategories"
                        :key="subcategory.id"
                        :value="subcategory.id"
                        :name="subcategory.name">{{subcategory.name}}</option>
                    </select>
                    
                    <label for="name">Name</label>
                    <input type="text" name="name" autocomplete="off">
                    <label for="description">Description</label>
                    <textarea name="description" rows="10"></textarea>
                    <br><br>
                    <label for="images">Images</label>
                    <input type="file" name="images[]" autocomplete="off" multiple>
                    <br><br>
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" autocomplete="on">
                    <label for="store_code">Store code</label>
                    <input type="text" name="store_code" autocomplete="on">
                    
                    
                    <div v-for="(spec, index) in specs" :key="index">
                        <label :for="spec.spec_name" :key="index">{{spec.spec_name}}</label>
                        <select :name="spec.spec_name.replace(/\s+/g, '')" v-model="values[index]">
                            <option v-for="(value, index) in spec.values" :key="index" :value="value.id">{{value.value}}</option>
                        </select>
                        <!-- <input type="text" :key="index" :name="spec" autocomplete="off"> -->
                    </div>

                    <!-- <button class="add-btn" type="sumbit" @click.prevent="storeProduct">Add product</button> -->
                    <button class="add-btn" type="sumbit">Add product</button>
                </form>
            </div>
		</div>
		<!-- <tab title="orders" id="orders">
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
		</tab> -->
        <p v-bind="inconsole()"></p>
        
	</div>
</div>        
    
    
</template>

<script>

import tab from "./tab";
import tabs from "./tabs";
import { ref, onMounted } from "vue";

export default {
    name: "product",
    components: {
        tab, tabs
    },

    props: {
        // categories: {
        //     required:true
        // },
        // products_object: {
        //     required: true
        // }
    },

    setup() {
        const active = ref(0)
        let qi = ref(null)
        onMounted(() => {
            qi.value
        })

        return {
            qi, active
        }
    },
    data() {
        return {

            categories:[],
            subcategories: [],
            specs: [],
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
            selected: {
                category: null,
                subcategory: null
            },
            values: [],
            test: 'Test',
        
        }
    },
    methods: {
        inconsole(){
         
        // console.log(this.selected);
            
        },
        sendValues(){            
            axios({
                method: 'post',
                params: this.test,
                url: '/api/values',
            })
            .then(response => {
                
                console.log(response)
                })
            .catch(error => console.log(error));

        },

        loadData(){

            axios({
                method: 'get',
                params: this.selected,
                url: '/api/category',
            })
            .then(response => {
                    this.categories = response.data.categories
                    this.subcategories = response.data.subcategories
                    console.log(response.data);
                })
            .catch(error => console.log(error));
        },
        
        getSub(){
            
            if(this.selected.category){
                this.categories.forEach(item => {
                    if(item.id == this.selected.category)
                        this.subcategories = item.subcategories
                })
            }
          

        },

        getCat(){
               
            if(this.selected.subcategory){
                this.subcategories.forEach(item => {
                    if(item.id == this.selected.subcategory)
                        this.selected.category = item.category_id
                })
            }

        },

        loadSpecs(){
            for (const item in this.subcategories) {
                if(this.subcategories[item].id == this.selected.subcategory){
                    this.specs = this.subcategories[item].specs
                    break
                }
            }
        },

        showInput(index){
            // this.showEdit[index].editing = true
            // this.$refs.qi[index].style.display = 'inline-block';
            
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
        // this.products_object.forEach(product =>{
        //     this.showEdit.push({editing: false})
        // })
    },

    mounted() {

        this.loadData()
        
        // this.$refs.qi.forEach(input => {
        //    this.$refs.qi[this.x].style.display = 'none';
        //    this.x ++
        // });
        
        // document.querySelector(".jsFilter").addEventListener("click", function () {
        //     document.querySelector(".filter-menu").classList.toggle("active");
        // });

        // document.querySelector(".grid").addEventListener("click", function () {
        //     document.querySelector(".list").classList.remove("active");
        //     document.querySelector(".grid").classList.add("active");
        //     document.querySelector(".products-area-wrapper").classList.add("gridView");
        //     document.querySelector(".products-area-wrapper")
        //         .classList.remove("tableView");
        // });

        // document.querySelector(".list").addEventListener("click", function () {
        //     document.querySelector(".list").classList.add("active");
        //     document.querySelector(".grid").classList.remove("active");
        //     document.querySelector(".products-area-wrapper").classList.remove("gridView");
        //     document.querySelector(".products-area-wrapper").classList.add("tableView");
        // });

        // var modeSwitch = document.querySelector('.mode-switch');
        // modeSwitch.addEventListener('click', function () {
        //     document.documentElement.classList.toggle('light');
        //     modeSwitch.classList.toggle('active');
        // });
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