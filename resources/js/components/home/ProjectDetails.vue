<template>
  <div class="row ">
    <transition name="scale1">
      <div v-if="show" class="col-md-8">
        <div class="row justify-content-center">
          <div class="col-md-10 left position-relative">
            <div class="col-md-12 mt-3">
              <h6>{{project.name}} - {{project.status==1?'Done':'On Progress'}}</h6>
              <span class="d-block sub-title ml-2">
                Started Date : {{project.created_at.split('T')[0]}}</span
              >
              <span v-if="project.status==1" class="d-block sub-title ml-2">
                Completed Date : {{project.updated_at.split('T')[0]}}</span
              >
              <div class="mt-2 ml d-inline-block">
                <!-- <a href=""
                  ><img
                    class="img-fluid"
                    style="height:20px;width:25px"
                    src="/storage/app/public/icons/share.png"
                /></a> -->
                <a href=""
                  ><img
                    class="img-fluid"
                    style="height:20px;width:25px"
                    src="/storage/icons/share.png"
                /></a>
              </div>

              <!-- <div class="mt-2 ml-2 d-inline-block">
                <a href=""
                  ><img
                    class="img-fluid"
                    style="height:20px;width:25px"
                    src="/storage/icons/share.png"
                /></a>
              </div> -->
              
            </div>

            <div v-if="project.youtube!=''" class="col-md-12 mt-3">
              <h6>Application Details</h6>
              <div>
                <b-embed
                  type="iframe"
                  aspect="16by9"
                  :src="project.youtube"
                  allowfullscreen
                ></b-embed>
              </div>
            </div>

            <div v-if="project.description!=''" class="col-md-12 mt-3">
              <h6>Description</h6>
              <p class="smallPara">
                <!-- It is a long established fact that a reader will be distracted by
                the readable content of a page when looking at its layout. The
                point of using Lorem Ipsum is that it has a more-or-less normal
                distribution of letters, as opposed to using 'Content here,
                content here', making it look like readable English. Many desktop
                publishing packages and web page editors now use Lorem Ipsum as
                their default model text, and a search for 'lorem ipsum' will
                uncover many web sites still in their infancy. Various versions
                have evolved over the years, sometimes by accident, sometimes on
                purpose (injected humour and the like -->
                {{project.description}}
              </p>
            </div>

            <div v-if="project.whyProject!=''" class="col-md-12 mt-3">
              <h6>Why This Project</h6>
              <p class="smallPara">
                <!-- It is a long established fact that a reader will be distracted by
                the readable content of a page when looking at its layout. The
                point of using Lorem Ipsum is that it has a more-or-less normal
                distribution -->
                {{project.whyProject}}
              </p>
            </div>

            <div v-if="project.incomes.length>0" class="col-md-12 mt-3">
              <h6>What You Wanna Learn From This Project</h6>

              <div v-for="inc in incomes" :key="inc" class="income w-80 mb-2">
                <span class="d-inline-block pt-1 pb-1 pl-2"
                  >{{inc}}</span
                >
              </div>
            </div>

            <div class="col-md-12 mt-3">
              <h6>Outcomes (What I Have Learned From This Project)</h6>

              <div v-for="out in outcomes" :key="out" class="outcomes w-80 mb-2">
                <span class="d-inline-block pt-1 pb-1 pl-2"
                  >{{out}}</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>

    <transition name="scale2">
      <div v-if="show" class="col-md-4">
        <div class="row justify-content-center">
          <div class="col-md-11 right">
            <div class="mt-3 project-statistic">
              <!-- <span class="d-block text-center">{{tasks.length}} Tasks</span>
              <span class="d-block text-center">{{days}} Days</span> -->

              <!-- <img src="../../assets/graph.png" class="img-fluid mt-2 mb-2" /> -->
            </div>

            <!-- <div v-if="tasks.length > 0" class="mt-3">
              <h6>All Tasks</h6>

              <div v-for="task in tasks" :key="task" class="outcomes w-80 mb-2">
                <span class="d-inline-block pt-1 task-title pb-1 pl-2 flaot-left"
                  >{{task}}
                </span>
                <span class="d-inline-block pt-1 task-time pb-1 pr-2 float-right"
                  >12min</span
                >
              </div>
            </div> -->

            <div v-if="techs.length > 0" class="mt-3">
              <h6>Used Technologies</h6>

              <div v-for="tech in techs" :key="tech" class="outcomes w-80 mb-2">
                <span class="d-inline-block pt-1 task-title pb-1 pl-2 flaot-left"
                  >{{tech}}
                </span>
                <!-- <span class="d-inline-block pt-1 task-time pb-1 pr-2 float-right"
                  >12min</span
                > -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>

  </div>
</template>
<script>
import {mapActions,mapGetters} from "vuex"
export default {
  name: "ProjectDetails",
  data(){
    return{
      id:0,
      project:{},
      incomes:[],
      outcomes:[],
      tasks:[],
      techs:[],
      days:0,
      show:false
    }
  },
  mounted(){
    this.id = this.$route.params.id;
    

    if(this.allProjects.length==0){
      this.getProjects();
    }

    this.project = this.allProjects.filter(p=>(p.id== this.id))[0];
    this.incomes = this.project.incomes!=""?this.project.incomes.split(','):[]
    this.outcomes = this.project.outcomes!=""?this.project.outcomes.split(','):[]
    this.tasks = this.project.tasks!=""?this.project.tasks.split(','):[]
    this.techs = this.project.tech!=""?this.project.tech.split(','):[]

    // calculate date deff
    let startDate = new Date(this.project.created_at);
    let endDate = this.project.status==1?new Date(this.project.updated_at):Date.now();
    this.days = parseInt((endDate-startDate)/(24*3600*1000));
    this.show = true;
  },
  computed:{
    ...mapGetters(['allProjects']),
    // status:this.project.status == 0?"Done":"On Going",
  },
  methods:{
    ...mapActions(['getProjects']),
  }
};
</script>

<style scoped>

/** animation keys start */
.scale1-enter-active, .scale1-leave-active,
.scale2-enter-active, .scale2-leave-active {
  /* transition: opacity .5s; */
  transform: scale(1);
  transition: all ease-in-out .4s;
}
.scale1-enter-active, .scale1-leave-active{
  transform-origin: center center ;
}
.scale1-enter, .scale1-leave-to,
.scale2-enter, .scale2-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: scale(0);
}

.scale2-enter-active, .scale2-leave-active{
  transition-delay: .2s !important;
  transform-origin: center center !important ;
  
}

/** animation keys ends */



.left,
.right {
  min-height: 95vh;
  background: #f9f9f9;
  /* box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.05); */
  border: none;
  border-radius: 0.5em;
  overflow: hidden;
}
h6 {
  font-family: "Changa", sans-serif;
  color: #6b7a73;
  font-weight: bold;
}
.sub-title {
  color: #ee9d24;
  font-family: "Annie Use Your Telescope", cursive;
}
.smallPara {
  font-family: "Annie Use Your Telescope", cursive;
  color: #6b7a73;
}
.income {
  background: #ee9d24;
  font-family: "Changa", sans-serif;
  border-radius: 1em;
}
.income span {
  font-size: 0.9em;
  color: #fbfbfb;
}

.outcomes {
  background: #fbfbfb;
  font-family: "Changa", sans-serif;
  border-radius: 1em;
}

.outcomes span {
  color: #6b7a73;
  font-size: 0.9em;
}

.project-statistic span {
  font-family: "Changa", sans-serif;
  font-weight: bold;
}
.project-statistic span:nth-child(1) {
  color: #ee9d24;
}
.project-statistic span:nth-child(2) {
  color: #6b7a73;
}

.task-time {
  color: #ee9d24 !important;
  font-family: "Annie Use Your Telescope", cursive;
}
</style>
