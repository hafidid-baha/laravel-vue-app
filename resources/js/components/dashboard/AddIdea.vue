<template>
    <div class="container">
        <Header title="Add New Idea" />

        <form class="mt-3">
            <div class="form-group">
                <label for="projectname">Idea Title</label>
                <input
                    type="text"
                    class="form-control"
                    id="ideatitle"
                    placeholder="Idea Title"
                    v-model="title"
                />
            </div>

            <div class="form-group">
                <label for="projectcat">Project Category</label>
                <select class="form-control" id="projectcat" v-model="projectcat">
                    <option v-for="cat in this.allProjectCat" :key="cat.id" :value=cat.id>{{cat.name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="projectname">Idea Description</label>
                <textarea
                    class="form-control"
                    id="ideadesc"
                    placeholder="Idea Description"
                    v-model="desc"
                ></textarea>
            </div>

            <div class="form-group">
                <button @click.prevent="submitIdea" class="btn btn-login">
                    Submit Your Idea
                </button>
            </div>
        </form>
    </div>
</template>
<script>
import Header from "../Header.vue";
import { mapActions,mapGetters } from "vuex";
export default {
    name: "AddIdea",
    components: {
        Header
    },
    data() {
        return {
            show: false,
            title: "",
            desc: "",
            projectcat:0
        };
    },
    mounted() {
        this.show = true;
    },
    methods: {
        ...mapActions(["addIdea"]),
        submitIdea() {
            if(this.projectcat==0 || this.title==""){
                alert("please Fill All The Information");
                return;
            }
            this.addIdea({ title: this.title, desc: this.title, project_category:this.projectcat });
        }
    },
    computed: mapGetters(['allProjectCat']),
};
</script>
