<template>
    <div class="container">
        <Header title="Interests" />
        
        <div class="row mt-3">
			<div class="col-md-12 pt-2 pb-2 text-center">
				<transition name="scale">
					<router-link v-if="show" to="/Dashboard/AddCategory" class="btn btn-login">Add New Category</router-link>
				</transition>
			</div>
		</div>

        <div class="row mt-3">
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Category Name</th>
							<th scope="col">Options</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="cat in allProjectCat" :key="cat.id">
							<td>{{cat.name}}</td>
							<td class="text-center">
								<router-link :to="'/Dashboard/EditCategory/'+cat.id" class="ml-2 mr-2"><img src="/storage/app/public/icons/edit.png" class="img-fluid" /></router-link>
								<a href="" @click.prevent="deletecat(cat.id)" class="ml-2 mr-2"><img src="/storage/app/public/icons/delete.png" class="img-fluid" /></a>
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
import {mapActions,mapGetters} from "vuex";
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
	methods:{
		...mapActions(['deleteCategory']),
		deletecat(id){
			const res = confirm("are you sure you want to delete this category");
			if(res){
				const fd = new FormData();
				fd.append('id',id);

				this.deleteCategory(fd);
			}
		}
	},
    mounted(){
        this.show = true
	},
	created(){
		
	},
	computed: mapGetters(['allProjectCat']),
}
</script>