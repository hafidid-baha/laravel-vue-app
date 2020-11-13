<template>
  <div class="container">
    <Header title="Add New Interest" />

    <form class="mt-3">
      <div class="form-group">
        <label for="interestname">Interest Name</label>
        <input
          type="text"
          class="form-control"
          id="interestname"
          placeholder="Interest Title"
          v-model="title"
        />
      </div>

      <div class="form-group">
        <label for="interestdesc">Interest Description</label>
        <textarea
          class="form-control"
          id="interestdesc"
          placeholder="Interest Description"
          v-model="desc"
        ></textarea>
      </div>

      <div class="form-group">
        <button @click.prevent="submitInterest" class="btn btn-login">Submit Your Interst</button>
      </div>
    </form>
  </div>
</template>
<script>
import Header from "../Header.vue";
import {mapActions} from "vuex";
export default {
  name: "AddInterest",
  components: {
    Header,
  },
  data() {
    return {
      show: false,
      title:'',
      desc:''
    };
  },
  mounted() {
    this.show = true;
  },
  methods:{
    ...mapActions(['addIntersts']),
    submitInterest(){
      this.addIntersts({title:this.title,desc:this.desc});
      this.title = '';
      this.desc = '';
    }
  }
};
</script>
