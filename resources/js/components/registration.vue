<template>
	<div>
		<!-- <form method="post" action="/register" @submit.prevent="onSubmit()">
			
			
			<label for="name"><strong> Login</strong></label>
			<input type="text" name="name" id="name" autocomplete="on">
			<label for="email"><strong> Email</strong></label>
			<input type="text" name="email" id="email" autocomplete="on" >
			<label for="password"><strong> Password</strong></label>
			<input type="text" name="password" id="password" placeholder="At least 6 characters" autocomplete="off">
			<label for="password"><strong>Re-enter Password</strong></label>
			<input type="text" name="password_confirmation" id="password_confirmation" placeholder="At least 6 characters" autocomplete="off">
			
			<button type="sumbit" >Register</button>
			<p>By creating an account, you agree to X-com's Conditions of Use and Privacy Notice.</p>
			<hr width=80%>
			Already have an account? Sign-In
		</form>	 -->
		<!-- @if (count($errors))
			@foreach ($errors->all() as $error)
			<h1>{{ $error }}</h1>
			@endforeach
		@endif -->
	</div>
</template>
<script>

class Errors{
  constructor(){

    this.errors = {}

  }

  get(error){

      this.errors = error

  }
}

export default {
  data() {
    return {

      login: '',
      email: '',
      password: '',
      c_password: '',
      errors: new Errors,
      // csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
  },
  methods:{
    onSubmit(){
        axios.post('/register', this.$data).then(response => alert('Adding')).catch(error => console.log(error.response.data))
        
    }
  }
};
</script>

<style>
    
</style>