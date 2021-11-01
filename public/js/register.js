class Errors{
    constructor(){
  
      this.errors = {
        //   'name' : 'Carl',
        //   'email': 'carl@me.com'
      }
  
    }
  
    get(field){
        // console.log('method working')
        if(this.errors[field]){
            return this.errors[field][0];
            //return this.errors[field][0];
            
        }
 
    }
    record(errors){
        this.errors = errors;
    }

    clear(field){
        if(Object.keys(this.errors)[0]){
            delete this.errors[field][0];
        }
    }
    
    has(field){
        // if(Object.keys(this.errors)[0])
        return this.errors.hasOwnProperty(field);
        
    }
    any(){

        return Object.keys(this.errors) > 0;

    }

 }
 class Form{
     constructor(data){
        

        for (let field in data){
            this[field] = data[field];
        }
        this.errors = new Errors;
     }
    // reset(){

    // }

    // submit(){

    // }
}
new Vue({
   
    el: '#app',   
    data: {
     
        form: new Form({
            name: '',
            email: '',
            password: '',
            // c_password: ''
        }),
        
        // csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        
    },
    methods:{
        onSubmit(){
            axios.post('/register', this.$data.form)
            .then(response => alert('Inserting'))
            .catch(error => this.form.errors.record(error.response.data.errors))
        },
        is_working(){
            return console.log('Damn!!!')
        }
    }
      
})



