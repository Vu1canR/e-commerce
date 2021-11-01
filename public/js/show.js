new Vue({
    
    el: '#app',   
    data: {
     
        drdown: false,
        bradius: '',
        expandImg: document.getElementsByClassName('pic-min')[0].src

        // csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        
    },
    methods:{
       
        borderChange(){
            if(this.drdown){
                return this.bradius = 'is-active'
            }
            else{
                return this.bradius = 'not-active'
            }
        },
        
        imgPreview(){
            this.expandImg = event.target.firstChild.getAttribute('src');
        }
      
    }
    
})