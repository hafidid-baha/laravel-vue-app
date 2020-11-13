<template>
  <div>
    <div class="container-fluid">
      <DashNav />
      <div class="container mt-2">
        <transition name="route" mode="out-in">
          <router-view />
        </transition>
      </div>
    </div>
  </div>
</template>
<script>
import DashNav from "../components/DashNav.vue";
import {mapActions,mapGetters} from "vuex";

export default {
  name:'Dashboard',
  components: {
    DashNav,
  },
  methods:{
    ...mapActions(["getUser","getUserSettings","getCategories"]),
  },
  created(){
    this.getUser();
    this.getUserSettings();
    this.getCategories();
  }
}
</script>
<style>

.form-control:focus{
  outline: none !important;
  box-shadow: none !important;
}


</style>
