<template>
    <div>
      <div class="container">
        
        <div class="row login-form justify-content-center align-items-center">
            <div class="col-md-6 align-self-center text-center">
                <input v-model="username" type="text" placeholder="username" class="login-input d-block w-75 mx-auto mt-2 mb-2 p-2" />
                <input v-model="password" type="password" placeholder="password" class="login-input d-block w-75 mx-auto mt-2 mb-2 p-2" />
                <button @click="userLogin" class="btn-login pt-2 pb-2 pl-4 pr-4 mx-auto d-inline-block mt-3" value="Login" >Login</button>
                <router-link to="/" class="text-dark d-block text-center text-decoration-none mt-2 home-link">Home Page</router-link>
            </div>
        </div>
          
      </div>
    
  </div>
</template>
<script>
import {mapActions} from 'vuex'
export default {
    name:'Login',
    data(){
        return{
            username:'',
            password:''
        }
    },
    methods:{
        ...mapActions(['login']),
        userLogin(){
            console.log('login button has been clicked');
            this.login({username:this.username,password:this.password});
        },
        
    }
}
</script>
<style scoped>
body{
    width:100vh;
    height:100vw;
    overflow: hidden;
}

.login-form{
    min-height:100vh ;
}

.login-input{
    border-radius: 20px;
    border: none !important;
    outline: none;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.05);
    text-align: center;
    font-family: 'Changa', sans-serif;
}

.login-input:focus,
.login-input:hover,
.login-input:valid{
    outline: none;
}


.home-link{
    font-family: 'Changa', sans-serif;
}

.btn-login{
    outline: none;
}

</style>