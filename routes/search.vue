<template>
    <form method="POST" action="/search" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="csrf">
        <div :class="extended" id="search">
            <input type="text" name="search" class="search-input" placeholder="Search..." @focus="searchExtended()" v-model="product_name" @keyup="doSearch($event.target)" autocomplete="off">
            <div class="search-result" v-show="rdisplay">
                <ul>
                    <li v-for="(item, index) in emptyResult" :key="index" class="srli" :bind="inConsole(item)">
                        <a :href="'../p/'+ item.store_code + '-' + item.name.replace(/ /g,'-').toLowerCase()" class="srlia"><i class="fa fa-search"></i> &nbsp; {{item.name}}</a>
                    </li>
                </ul>
            </div>
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data(){
        return {
            drdown: false,
            bradius: '',
            product_name:'',
            response: '',
            rdisplay: false,
            extended: 'search',
            class_array: ['search','search-extended', 'search-result', 'searchButton', 'search-input', 'fa fa-search', 'srlia'],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },

    methods: {
        inConsole(el){
            console.log(el)
        },
        doSearch(name){
 
                
            axios({
                method: 'post',
                url: '/api/search',
                data: {
                user_input: this.product_name,     
                }
            })
            .then(response => this.response = response.data.result.data)
            // .then(response => console.log(response.data))
            .catch(error => console.log(error));
        },

        emptySearchInput(){
            this.product_name = ''
            this.rdisplay = true
        },
        searchExtended(){
            this.extended = 'search-extended'
            this.rdisplay = true;
        },


    },
    mounted() {
        window.addEventListener("mouseup", element => {
        if(this.class_array.includes(element.target.className)){
            this.rdisplay = true;
        }
        else{
            this.extended = 'search';
            this.rdisplay = false;
        }
        })
    },
    computed: {
        emptyResult(){
            if(this.product_name == ''){
                this.response = ''
            }
            return this.response
        }
    },

    // mounted() {
	// 	var self = this
	// 	window.addEventListener('click', function(e){
	// 		if (!e.target.classList.contains('dd-btn'))
	// 		{
	// 			self.close()
	// 		}
	// 	}, false)
	// },

}
    
</script>