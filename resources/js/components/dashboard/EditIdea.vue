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
                    <option :selected="projectcat==cat.id" v-for="cat in this.allProjectCat" :key="cat.id" :value=cat.id>{{cat.name}}</option>
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
    name: "EditIdea",
    components: {
        Header
    },
    data() {
        return {
            show: false,
            title: "",
            desc: "",
            projectcat:0,
            idea: null,
            id:0
        };
    },
    mounted() {
        this.show = true;
        this.id = this.$route.params.id;
        this.idea = this.allIdeas.filter(idea => idea.id==this.id)[0];

        this.title = this.idea.title;
        this.desc = this.idea.description;
        this.projectcat =  this.idea.project_category;
    },
    methods: {
        ...mapActions(["updateIdea"]),
        submitIdea() {
            if(this.projectcat==0 || this.title==""){
                alert("please Fill All The Information");
                return;
            }
            const fd = new FormData();
            // fd.append('id',this.id);
            // fd.append('title',this.title);
            // fd.append('desc',this.description);
            // fd.append('projectcat',this.projectcat);
            this.updateIdea({ id:this.id,title: this.title, desc: this.desc, projectcat:this.projectcat });
        }
    },
    computed: mapGetters(['allIdeas','allProjectCat']),
};
</script>
