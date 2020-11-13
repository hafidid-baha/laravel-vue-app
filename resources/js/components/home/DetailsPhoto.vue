<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row DetaisHeader">
                <div class="col-md-6 m-0 p-0">
                    <div class="col-md-12 leftStatus">
                        <div class="row">
                            <div class="col-md-4 pt-3 pb-3">
                                <span class="d-block text-center w-100 status">Projects</span>
                                <span class="d-block text-center w-100 status">45</span>
                            </div>
                            <div class="col-md-4 pt-3 pb-3">
                                <span class="d-block text-center w-100 status">Private Projects</span>
                                <span class="d-block text-center w-100 status">35</span>
                            </div>
                            <div class="col-md-4 pt-3 pb-3">
                                <span class="d-block text-center w-100 status">Tasks</span>
                                <span class="d-block text-center w-100 status">200</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 m-0 p-0">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 pt-3 pb-3">
                                <span class="d-block text-center w-100 statusRight">Completed</span>
                                <span class="d-block text-center w-100 statusRight">45</span>
                            </div>
                            <div class="col-md-4 pt-3 pb-3">
                                <span class="d-block text-center w-100 statusRight">Worked On Projects</span>
                                <span class="d-block text-center w-100 statusRight">35</span>
                            </div>
                            <div class="col-md-4 pt-3 pb-3">
                                <span class="d-block text-center w-100 statusRight">New Ideas</span>
                                <span class="d-block text-center w-100 statusRight">200</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <transition name="scale">
                    <div v-if="show" class="col-xs-12 col-sm-6 mb-4 col-md-4 col-lg-2 text-center">
                        <div class="col-md-11 card card-yallow position-relative">
                            <span class="position-absolute  card-icon d-flex align-items-center justify-content-center"><img class="img-fluid" src="/storage/app/public/icons/wordpress.png" /></span>
                            <div class="tasksCount text-left pt-4">
                                <span class="d-block">200</span>
                                <span class="d-block">Tasks</span>
                            </div>
                            <div class="mt-3">
                                <router-link to="/ProjectDetails" class="text-center text-decoration-none">Project Name</router-link>
                                <p class="m-0">2020-11-02</p>
                                <span class="d-inline-block mb-1 bg-white text-dark projectState text-center">Worked On</span>
                            </div>
                        </div>
                    </div>
                </transition>

                <transition name="scale">
                    <div v-if="show" class="col-xs-12 col-sm-6 mb-4 col-md-4 col-lg-2 text-center">
                        <div class="col-md-11 card card-dark position-relative ">
                            <span class="position-absolute card-icon d-flex align-items-center justify-content-center"><img class="img-fluid" src="/storage/app/public/icons/wordpress.png" /></span>
                            <div class="tasksCount text-left pt-4">
                                <span class="d-block">200</span>
                                <span class="d-block">Tasks</span>
                            </div>
                            <div class="mt-3">
                                <router-link to="/ProjectDetails" class="text-center text-decoration-none">Project Name</router-link>
                                <p class="m-0">2020-11-02</p>
                                <span class="d-inline-block mb-1 bg-white text-dark projectState text-center">Completed</span>
                            </div>
                        </div>
                    </div>
                </transition>
            </div> 
             

        </div>
    </div>
</template>
<script>
export default {
    name:'Details',
    data(){
        return{
            show:false
        }
    },
    mounted(){
        this.show = true
    }
}
</script>

<style scoped>
/** animations and transitions */
.scale-enter-active, .scale-leave-active {
  transition: all ease-in-out .2s;
  transition-delay: 0.2s;
  transform: scale(1);
  transform-origin: center bottom;
}
.scale-enter, .scale-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: scale(0);
  opacity: 0;
}

/** animations and transitions */

.DetaisHeader{
    background: #F5F5F5;
    border-radius: 5em;
    /* box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.16); */
}
.leftStatus{
    background: #FBFBFB;
    border-radius: 5em;
    color: black;
    height: 100%;
}
.status,.statusRight{
    font-family: 'Changa', sans-serif;
    /* font-weight: bold; */
}
.statusRight{
    color: #EE9D24;
}
.card-yallow{
    background: #EE9D24;
}

.card-yallow .tasksCount span{
    color: #F5F5F5;
}

.card-dark .tasksCount span{
    color: #EE9D24;
}

.card-dark{
    background: #F5F5F5;
    
}

.card-dark .tasksCount{
    color: #F5F5F5;
}

.card{
    min-height: 170px;
    /* box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.06); */
    border:none;
    border-radius: 1em;
}
.card-yallow a,.card-yallow p,.card-yallow a:hover{
    font-family: 'Changa', sans-serif;
    color: white;
}

.card-dark a,.card-dark p,.card-dark a:hover{
    font-family: 'Changa', sans-serif;
    color: #6B7A73;
}

.card-icon{
    width: 5em;
    height: 5em;
    right: -0.6em;
    top: -0.6em;
    background: #FBFBFB;
    border-radius: 50%;
    border: none;
}

.tasksCount{
    font-family: 'Annie Use Your Telescope', cursive;
}
.projectState{
    font-family: 'Annie Use Your Telescope', cursive;
    border-radius: 20px;
    padding-left: 1em;
    padding-right: 1em;
}
.card-yallow .projectState{
    background: #FBFBFB !important;
}

.card-dark .projectState{
    background: #EE9D24 !important;
    color:#FBFBFB !important;
}
</style>