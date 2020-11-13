<template>
    <nav class="mt-2 p-0 d-none d-md-block">
        <ul class="p-2 ">
            
            <!-- <li class="p-1 mb-2"><router-link to="/Dashboard"><img src="/storage/app/public/icons/home.png" class="img-fluid" /></router-link></li> -->
            <li class="p-1 mb-2"><router-link to="/Dashboard"><img src="/storage/icons/home.png" class="img-fluid" /></router-link></li>
            <li class="p-1 mb-2"><router-link to="/Dashboard/Categories"><img src="/storage/icons/categories.png" class="img-fluid" /></router-link></li>
            <li class="p-1 mb-2"><router-link to="/Dashboard/Project"><img src="/storage/icons/toolbox.png" class="img-fluid" /></router-link></li>
            <li class="p-1 mb-2"><router-link to="/Dashboard/Interests"><img src="/storage/icons/tasks.png" class="img-fluid" /></router-link></li>
            <li class="p-1 mb-2"><router-link to="/Dashboard/Ideas"><img src="/storage/icons/brain.png" class="img-fluid" /></router-link></li>
            <li class="p-1 mb-2"><router-link to="/Dashboard/Profile"><img src="/storage/icons/gear.png" class="img-fluid" /></router-link></li>
            <li class="p-1 mb-2"><router-link to="/"><img src="/storage/icons/homepage.png" class="img-fluid" /></router-link></li>
            <li class="p-1 mb-2"><router-link to="/Logout"><img src="/storage/icons/logout.png" class="img-fluid" /></router-link></li>
        </ul>
    </nav>
</template>
<script>
import {mapGetters} from 'vuex'
export default {
    name:'DashNav',
    computed : mapGetters(["loggedIn"])
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