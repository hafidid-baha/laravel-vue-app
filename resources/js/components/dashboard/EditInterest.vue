<template>
  <div class="container">
    <Header title="Update Interest" />

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
import {mapActions,mapGetters} from "vuex";
export default {
  name: "EditInterest",
  components: {
    Header,
  },
  data() {
    return {
      show: false,
      title:'',
      desc:'',
      id:0,
      interest:null
    };
  },
  mounted() {
    this.show = true;
    this.id = this.$route.params.id;
    this.interest = this.allInterests.filter(intr => intr.id == this.id)[0];
    this.title = this.interest.title;
    this.desc = this.interest.description;
  },
  methods:{
    ...mapActions(['updateIntersts']),
    submitInterest(){
      const fd = new FormData();
      fd.append('title',this.title);
      fd.append('desc',this.desc);
      fd.append('id',this.id);
      this.updateIntersts(fd);
      this.title = '';
      this.desc = '';
    }
  },
  computed: mapGetters(['allInterests'])
};
</script>
