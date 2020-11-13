<template>
    <div class="row justify-content-center">
			<div class="vertical-nav ml-2 mr-2 w-100">
				<ul class="vernavitems text-center">
					<li class="p-1"><router-link to="/"><img src="/storage/icons/home.png" class="img-fluid" /></router-link></li>
					<li v-for="cat in allProjectCat" :key="cat.id" class="p-1 mb-2">
						<router-link :to="'/Details/'+cat.id"><img :src="'/storage/icons/'+cat.icon" class="img-fluid" /></router-link>
					</li>
				</ul>
			</div>
		</div>
</template>
<script>
import {mapGetters} from 'vuex';
export default {
	name:'VerNav',
	computed : mapGetters(["loggedIn","allProjectCat"])
}
</script>
<style>
/** vertical nev styling */
.vertical-nav{
	min-height: 50px;
	background: #F5F5F5;
	border-radius: 30px;
}

.vernavitems li{
	display: inline-block;
	list-style: none;
	width: 30px;
	height:30px;
}
</style>