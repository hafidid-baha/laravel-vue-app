<template>
    <nav class="mt-2 p-0 d-none d-md-block">
        <ul class="p-2 ">
            <li @click="navClicked" class="p-1 mb-2"><router-link to="/"><img src="/storage/icons/home.png" class="img-fluid" /></router-link></li>
            <li v-if="loggedIn" class="p-1 mb-2"><router-link to="/Dashboard"><img src="/storage/icons/dashboard.png" class="img-fluid" /></router-link></li>
                <!-- <li class="p-1 mb-2"><router-link to="/Details/2"><img src="/storage/icons/wordpress.png" class="img-fluid" /></router-link></li>
                <li class="p-1 mb-2"><router-link to="/Details/2"><img src="/storage/icons/html.png" class="img-fluid" /></router-link></li>
                <li class="p-1 mb-2"><router-link to="/Details/2"><img src="/storage/icons/laravel.png" class="img-fluid" /></router-link></li>
                <li class="p-1 mb-2"><router-link to="/Details/2"><img src="/storage/icons/vue js.png" class="img-fluid" /></router-link></li> -->
            <li v-for="cat in allProjectCat" :key="cat.id" class="p-1 mb-2">
                <router-link :to="'/Details/'+cat.id"><img @click="navClicked(cat.id)" :src="'/storage/icons/'+cat.icon" class="img-fluid" /></router-link>
            </li>
            <li v-if="!loggedIn" class="p-1 mb-2"><router-link to="/Login"><img src="/storage/icons/enter.png" class="img-fluid" /></router-link></li>
            <li v-if="loggedIn" class="p-1 mb-2"><router-link to="/Logout"><img src="/storage/icons/logout.png" class="img-fluid" /></router-link></li>
            
        </ul>
    </nav>
</template>
<script>
import {mapGetters,mapActions} from 'vuex';
export default {
    name:'Nav',
    computed : mapGetters(["loggedIn","allProjectCat"]),
    methods:{
        ...mapActions(["updateTheCategories"]),
        navClicked: function(id){
            // let id = this.$route.params.id;
            this.updateTheCategories(id);
            // alert("the selected id is "+id);
        }
    }
}
</script>

<style scoped>
nav{
    width:50px;
    overflow: hidden;
    left:10px;
    min-height: 60vh;
    /* border: 1px solid black; */
    border-radius: 30px;
    background: #F5F5F5;
    /* box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.16); */
    position: fixed;
    z-index: 1000;
}
nav li{
    list-style: none;
}
</style>