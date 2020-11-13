<template>
    <div class="container">
        <Header title="Create New Project" />

        <form class="mt-3">
            <div class="form-group">
                <label for="projectname">Project Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="projectname"
                    placeholder="Project Name"
                    v-model="projectname"
                />
            </div>
            <div class="form-group">
                <label for="projectdesc">Project Description</label>
                <textarea
                    class="form-control"
                    id="projectdesc"
                    placeholder="Project Description"
                    v-model="projectdesc"
                ></textarea>
            </div>
            <div class="form-group">
                <label for="projectcatefory">Project Category</label>
                <select class="form-control" id="projectcat" v-model="projectcat">
                    <option v-for="cat in this.allProjectCat" :key="cat.id" :value=cat.id>{{cat.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="projectlink">Project Video Link</label>
                <input
                    type="text"
                    class="form-control"
                    id="projectlink"
                    placeholder="Project Video Link"
                    v-model="projectvid"
                />
            </div>
            <div class="form-group">
                <label for="projectcouse">Why This Project</label>
                <textarea
                    class="form-control"
                    id="projectcouse"
                    placeholder="Why This Project"
                    v-model="projectwhy"
                ></textarea>
            </div>
            <div class="form-group">
                <label for="projectlearn"
                    >What You Wanna Learn From This Project</label
                >
                <inputTag v-model="incomes"></inputTag>
            </div>
            <div class="form-group">
                <label for="projectoutcomes">Outcomes</label>
                <inputTag v-model="outcomes"></inputTag>
            </div>

            <div class="form-group">
                <label for="projectoutcomes">Used Technoloys</label>
                <inputTag v-model="framworks"></inputTag>
            </div>

            <div class="form-group">
                <label for="projectoutcomes">Tasks</label>
                <inputTag  v-model="tasks"></inputTag>
            </div>

            <div class="form-group">
                <label for="projectcouse">Status</label>
                <div class="form-check">
                    <input type="checkbox" v-model="projectDone" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Project Complete</label>
                </div>
            </div>


            <div class="form-group">
                <button @click.prevent="submitProject" class="btn btn-login">Add Project</button>
            </div>
        </form>
    </div>
</template>
<script>
import Header from "../Header.vue";
import InputTag from 'vue-input-tag';
import {mapGetters,mapActions} from "vuex";
import axios from "axios";
export default {
    name: "AddProjects",
    components: {
        Header,InputTag
    },
    data(){
        return{
            projectname:'',
            projectdesc:'',
            projectwhy:'',
            projectvid:'',
            framworks: [],
            outcomes: [],
            incomes: [],
            tasks: [],
            projectcat:0,
            projectDone:false
        }
    },
    methods:{
        ...mapActions(["addProject"]),
        submitProject(){
            var formdata = new FormData();
            formdata.append("projectname",this.projectname);
            formdata.append("projectdesc",this.projectdesc);
            formdata.append("projectwhy",this.projectwhy);
            formdata.append("projectvid",this.projectvid);
            formdata.append("projectcat",this.projectcat);
            formdata.append("projectdone",this.projectDone?1:0);
            formdata.append("framworks",this.framworks);
            formdata.append("outcomes",this.outcomes);
            formdata.append("incomes",this.incomes);
            formdata.append("tasks",this.tasks);

            for(var value of formdata.values()){
                console.log(value);
            }

            this.addProject(formdata);
        }
    },
    computed: mapGetters(['allProjectCat'])
};
</script>
<style>
form {
    font-family: "Changa", sans-serif !important;
}
input,
textarea,
select {
    /* border: 1px solid #EE9D24 !important; */
    border: 1px solid #ced4da !important;
}
.form-control {
    border-radius: 0px;
}
.form-control:focus {
    /* box-shadow: 0px 0px 6px rgba(238, 157, 36, 1); */
    box-shadow: none;
}
.btn-form {
    background: #ee9d24;
    color: white;
}
</style>
