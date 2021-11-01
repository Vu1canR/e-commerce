class Errors{
    constructor(){
  
      this.errors = {
        
      }
      
    }

  
    get(field){
        // console.log(this.errors[field])
        if(this.errors[field]){
            return this.errors[field][0];
           
                   
        }
 
    }
    record(errors){
        this.errors = errors;
          
    }

   
    
    has(field){
        // console.log(this.errors[field])
        return this.errors.hasOwnProperty(field);

    }
    // any(){

    //     return Object.keys(this.errors) > 0;

    // }

}

class Form{
    constructor(data){
       

       for (let field in data){
           this[field] = data[field];
       }
       
    }

}

new Vue({
   
    el: '#app',   
    data: {
        
        form: new Form({
            name: '',
            email: '',
            password: '',
            
        }),
        // c_password: '',
        errors: new Errors,
        isDisabled: true

        
        // csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        
    },
    methods:{
        onSubmit(){
            axios.post('/register2' ,
                this.$data.form
            // my_array = [
            //     name = this.name,
            //     email = this.email,
            //     password = this.password
            //     ]
            )
            
            .then(response => alert('Inserting'))
            .catch(error => this.errors.record(error.response.data.errors))
            // for (let d_key in error.response.data.errors)
            // this.my_dic[d_key] = error.response.data.errors[d_key]
            
        },
        is_working(){
            // if (this.form.name == ""){
                // return console.log(this.name + " enter name")
                return console.log(this.$data)
            // }
            // else{
                // return console.log(this.form.name)
            // }
        }
    }
      
})



