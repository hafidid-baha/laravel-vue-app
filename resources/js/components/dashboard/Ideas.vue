<template>
    <div class="container">
        <Header title="Ideas" />

        <div class="row mt-3">
			<div class="col-md-12 pt-2 pb-2 text-center">
				<transition name="scale">
					<router-link v-if="show" to="/Dashboard/AddIdea" class="btn btn-login">Add New Idea</router-link>
				</transition>
			</div>
		</div>

        <div class="row mt-3">
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Idea Title</th>
							<th scope="col">Options</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="idea in allIdeas" :key="idea.id">
							<td>{{idea.title}}</td>
							<td class="text-center">
								<router-link :to="'/Dashboard/EditIdea/'+idea.id" class="ml-2 mr-2"><img src="/storage/app/public/icons/edit.png" class="img-fluid" /></router-link>
								<a href="" @click.prevent="removeIdea(idea.id)" class="ml-2 mr-2"><img src="/storage/app/public/icons/delete.png" class="img-fluid" /></a>
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
import { mapActions,mapGetters } from 'vuex';
export default {
    name:"Ideas",
    components:{
        Header
    },
    data(){
        return{
            show:false
        }
	},
	methods:{
		...mapActions(['getIdeas','deleteIdea']),
		removeIdea(id){
			const res = confirm("are you sure you want to delete this item");
			if(res){
				// alert('result is ok');
				const fd = new FormData();
				fd.append('id',id);

				this.deleteIdea(fd);
			}
		}
	},
    mounted(){
        this.show = true
	},
	created(){
		this.getIdeas();
	},
	computed: mapGetters(['allIdeas'])
}
</script>