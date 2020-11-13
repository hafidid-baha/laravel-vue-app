<template>
  <div>
    <div class="container-fluid">
      <Nav />
      <VerNav class="d-md-none" />
      <div class="container mt-2">
        <transition name="route" mode="out-in">
          <router-view />
        </transition>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import Nav from "../components/Nav.vue";
import VerNav from "../components/VerNav.vue";
// import Infoleft from '@/components/home/Infoleft.vue'

export default {
  name: "Home",
  components: {
    Nav,VerNav
  },
};
</script>
<style scoped>
/** animation keys start */
/* .route-enter-active, .route-leave-active {
  transition: all .2s;

}
.route-enter, .route-leave-to /* .fade-leave-active below version 2.1.8 {
  opacity: 0;
  transform: translateX(-30%);
} */

/** animation end */

.right {
  background: #f9f9f9;
  border-radius: 20px;
  min-height: 95vh;
  box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.16);
}

</style>
