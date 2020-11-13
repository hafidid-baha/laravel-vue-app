<template>
    <div class="container">
        <Header title="Interests" />
        
        <div class="row mt-3">
			<div class="col-md-12 pt-2 pb-2 text-center">
				<transition name="scale">
					<router-link v-if="show" to="/Dashboard/AddInterest" class="btn btn-login">Add New Tnterest</router-link>
				</transition>
			</div>
		</div>

        <div class="row mt-3">
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Interests Name</th>
							<th scope="col">Options</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="interest in allInterests" :key="interest.id">
							<td>{{interest.title}}</td>
							<td class="text-center">
								<router-link :to="'/Dashboard/EditInterest/'+interest.id" class="ml-2 mr-2"><img src="/storage/app/public/icons/edit.png" class="img-fluid" /></router-link>
								<a href="" @click.prevent="deleteinterest(interest.id)" class="ml-2 mr-2"><img src="/storage/app/public/icons/delete.png" class="img-fluid" /></a>
								<!-- <a href="" class="ml-2 mr-2"><img src="@/assets/task.png" class="img-fluid" /></a> -->
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
    </div>
</template>
<script>
import Header from '../Header.vue';
import {mapActions,mapGetters} from 'vuex';
export default {
    name:'Interests',
    components:{
        Header
    },
    data(){
        return{
            show:false
        }
    },
    mounted(){
        this.show = true
	},
	methods:{
		...mapActions(['getInterests']),
		deleteinterest(id){
			const res = confirm("are you sure you want to delete this item");
			if(res){
				const fd = new FormData();
				fd.append('id',id);

				
				this.deleteCategory(fd);
			}
		}
	},
	created(){
		if(this.allInterests.length==0){
			this.getInterests();
		}
	},
	computed: mapGetters(['allInterests'])
}
</script>