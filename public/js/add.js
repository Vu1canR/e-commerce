var myapp = new Vue({
    
    el: '#app',  
    // props:{
    //     fields: {}
    // },
    data: {
        
        subcategory: '',
        fields_array : []
        
    },
    methods: {
        getFields(field){
            // console.log(field)
            // axios.post('/add').then(response => alert(response))
            // .catch(error => this.errors_list.record(error.response.data.errors))
            
            // let selectedVal = this.value;
            
        axios.post("http://127.0.0.1:8000/add", {
            params: {
                specs: self.field
            }
            })
            .then(function(res) {
            self.areaList = res.data;
            })
            .catch(function(error) {
            console.log("Error:", error);
            });
        // axios.post('/add', 
        
        // for (let field in data){
                
        // }
        
        // )
        
        
        // .then(response => alert('Adding'))
        
        },
        is_working(){
            return console.log('Damn!!!')
        }
    }
      
})



