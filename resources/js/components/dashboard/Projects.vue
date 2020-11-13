<template>
	<div class="container">
		<Header title="Projects" /> 
		<div class="row mt-3">
			<div class="col-md-12 pt-2 pb-2 text-center">
				<transition name="scale">
					<router-link v-if="show" to="/Dashboard/AddProject" class="btn btn-login">Create Project</router-link>
				</transition>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Project Name</th>
							<th scope="col">Options</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="project in allProjects" :key="project.id">
							<td>{{project.name}}</td>
							<td class="text-center">
								<router-link :to="'/Dashboard/EditProject/'+project.id" class="ml-2 mr-2"><img src="/storage/app/public/icons/edit.png" class="img-fluid" /></router-link>
								<a href="" @click.prevent="removeProject(project.id)" class="ml-2 mr-2"><img src="/storage/app/public/icons/delete.png" class="img-fluid" /></a>
								<router-link :to="'/Dashboard/DashProjectDetails/'+project.id" class="ml-2 mr-2"><img src="/storage/app/public/icons/task.png" class="img-fluid" /></router-link>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>
<script>
import {mapActions,mapGetters} from "vuex"
import Header from "../Header.vue"
export default {
	name:"Projects",
	components:{
		Header
	},
	data(){
        return{
            show:false
        }
    },
    mounted(){
		this.show = true;
	},
	created(){
		if(this.allProjects.length==0){
            this.getProjects();
        }
	},
	methods:{
		...mapActions(['getProjects','deleteProject']),
		removeProject(id){
			let res = confirm("are you sure you want to delete this item?");
			if(res){
				var formdata = new FormData();
				formdata.append('id',id);
				this.deleteProject(formdata);
			}
		}
	},
	computed: mapGetters(['allProjects'])
}
</script>
<style>
.btn-option,.btn-option:hover{
	border-radius: 0px;
	background: #EE9D24;
	border: none;
	color: white;
}
.btn-option:hover{
	background: #EE9D24;
}
.table{
	font-family: 'Changa', sans-serif !important;
}
.table th,.table td{
	border: none;
}
</style>