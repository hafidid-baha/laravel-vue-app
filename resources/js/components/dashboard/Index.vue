<template>
    <div class="container">
        <Header title="Home" />
        <div class="row mt-4">
            <transition name="scale">
                <div v-if="show" class="col-md-3">
                    <div class="row pt-2 pb-2 rounded">
                        <div class="col-11 dashProjectItem pt-2 pb-2">
                            <p class="ProjectItemstitle">Projects</p>
                            <div class="col-11">
                                <span class="projectItemCount d-block text-center">{{allProjects.length}}</span>
                            </div>
                            <div class="col-11 text-center">
                                <router-link to="/Dashboard/project" class="projectItemLink text-decoration-none" >Manage</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
            
            <transition name="scale">
                <div v-if="show" class="col-md-3">
                    <div class="row pt-2 pb-2 rounded">
                        <div class="col-11 dashProjectItem pt-2 pb-2">
                            <p class="ProjectItemstitle">Tasks</p>
                            <div class="col-11">
                                <span class="projectItemCount d-block text-center">{{taskscount}}</span>
                            </div>
                            <div class="col-11 text-center">
                                <router-link to="/Dashboard/Project" class="projectItemLink text-decoration-none" >Manage</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>

            <transition name="scale">
                <div v-if="show" class="col-md-3">
                    <div class="row pt-2 pb-2 rounded">
                        <div class="col-11 dashProjectItem pt-2 pb-2">
                            <p class="ProjectItemstitle">Ideas</p>
                            <div class="col-11">
                                <span class="projectItemCount d-block text-center">{{allIdeas.length}}</span>
                            </div>
                            <div class="col-11 text-center">
                                <router-link to="/Dashboard/Ideas" class="projectItemLink text-decoration-none" >Manage</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>

            <transition name="scale">
                <div v-if="show" class="col-md-3">
                    <div class="row pt-2 pb-2 rounded">
                        <div class="col-11 dashProjectItem pt-2 pb-2">
                            <p class="ProjectItemstitle">Interests</p>
                            <div class="col-11">
                                <span class="projectItemCount d-block text-center">{{allInterests.length}}</span>
                            </div>
                            <div class="col-11 text-center">
                                <router-link to="/Dashboard/Interests" class="projectItemLink text-decoration-none" >Manage</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
        <transition name="scale">
            <div v-if="show" class="row">
                <div class="col-12">
                    <hr />
                    <h5 class="lastActivity text-dark">Last Activity</h5>
                </div>
            </div>
        </transition>
        
        <transition name="scale">
            <div v-if="show" class="row mt-4 justify-content-center">
                
                <div class="col-md-3">
                    <div class="row pt-2 pb-2 rounded">
                        <div class="col-11 dashProjectItem pt-2 pb-2">
                            <p class="ProjectItemstitle">Last Project</p>
                            <div class="col-11">
                                <span class="projectItemCount font-normal d-block text-center">{{allProjects[allProjects.length-1].name}}</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row pt-2 pb-2 rounded">
                        <div class="col-11 dashProjectItem pt-2 pb-2">
                            <p class="ProjectItemstitle">Last Activity</p>
                            <div class="col-11">
                                <span class="projectItemCount d-block text-center">{{allProjects[allProjects.length-1].updated_at.split('T')[0]}}</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
import Header from '../Header.vue';
import {mapGetters,mapActions} from "vuex";
export default {
    name:'Index',
    components:{
        Header
    },
    data(){
        return{
            show:false,
            taskscount:0
        }
    },
    mounted(){
        this.show = true
        this.taskscount = this.gettaskscount();
        // allert()
    },
    created(){
        if(this.allProjects.length==0){
            this.getProjects();
        }
        if(this.allIdeas.length==0){
            this.getIdeas();
        }
        if(this.allInterests.length==0){
            this.getInterests();
        }
    },
    methods:{
        ...mapActions(['getProjects','getIdeas','getInterests']),
        gettaskscount(){
            let tcount = 0;
            this.allProjects.forEach(project => {
            tcount += project.tasks!=""?project.tasks.split(',').length:0
            });
            return tcount;
        }
    },
    computed:mapGetters(['allProjects','allIdeas','allInterests']),
    updated(){
        this.taskscount = this.gettaskscount();
    }
}
</script>

<style>
.dashProjectItem{
    background: #EE9D24;
    min-height: 130px;
}
.ProjectItemstitle,.projectItemCount,.lastActivity,.projectItemLink{
    font-family: 'Changa', sans-serif !important;
    color: #FBFBFB;
}
.projectItemCount{
    font-size: 2em !important;
}
.projectItemLink{
    /* text-decoration: none !important; */
    color: #FBFBFB !important;
}
.lastActivity{
    text-align:center ;   
}
.font-normal{
    font-size: 1em !important;
}

</style>