<template>
  <div class="container">
    <Header title="Profile" />

    <form class="mt-3">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="fullname">Full Name</label>
            <input
              type="text"
              class="form-control"
              id="fullname"
              placeholder="Full Name"
              v-model="user.name"
            />
          </div>

          <div class="form-group">
            <label for="aboutme">About Me</label>
            <textarea
              class="form-control"
              id="aboutme"
              placeholder="About Me"
              v-model="userset.about"
            ></textarea>
          </div>

          <div class="form-group">
            <label for="slug">Slug</label>
            <input
              type="text"
              class="form-control"
              id="slug"
              placeholder="Put Your Slug Here"
              v-model="userset.slug"
            />
          </div>
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <input
              type="text"
              class="form-control"
              id="facebook"
              placeholder="Facebook Acount Url"
              v-model="userset.facebook"
            />
          </div>
          <div class="form-group">
            <label for="linkedin">LinkedIn</label>
            <input
              type="text"
              class="form-control"
              id="linkedin"
              placeholder="LinkedIn Acount Url"
              v-model="userset.linkedin"
            />
          </div>
          <div class="form-group">
            <label for="github">Github</label>
            <input
              type="text"
              class="form-control"
              id="github"
              placeholder="Github Acount Url"
              v-model="userset.github"
            />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Profile Image</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" @change="imageselected" />
              <label class="custom-file-label" for="customFile"
                >Choose file</label
              >
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="Email"
              v-model="user.email"
            />
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input
              type="text"
              class="form-control"
              id="username"
              placeholder="Username"
            />
          </div>
          <div class="form-group">
            <label for="email">Passowrd</label>
            <input
              type="password"
              class="form-control"
              id="password"
              placeholder="Password"
              v-model="password"
            />
          </div>
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-login" @click.prevent="saveUser">Save</button> 
      </div>
    </form>
  </div>
</template>
<script>
import Header from "../Header.vue";
import {mapActions,mapGetters} from "vuex";
export default {
  name: "Profile",
  components: {
    Header,
  },
  data(){
    return{
      user:{name:'',email:''},
      userset:{},
      password:'',
      selectedImage:null
    }
  },
  methods:{
    ...mapActions(["updateUser"]),
    saveUser(){
      let data = {};
      data.name = this.user.name;
      data.email = this.user.email;
      // user settings
      data.about = this.userset.about;
      data.github = this.userset.github;
      data.linkedin = this.userset.linkedin;
      data.slug = this.userset.slug;
      data.facebook = this.userset.facebook;

      var formData = new FormData();

      formData.append("name" , this.user.name);
      formData.append("email" , this.user.email);
      // user settings
      formData.append("about" , this.userset.about);
      formData.append("github" , this.userset.github);
      formData.append("linkedin" , this.userset.linkedin);
      formData.append("slug" , this.userset.slug);
      formData.append("facebook" , this.userset.facebook);

      // Display the values
      // for (var value of formData.values()) {
      //   console.log(value); 
      // }

      // return;

      // update the user main info
      if(this.password !== ''){
        formData.append("password",this.password);
      }
      if(this.selectedImage != null){
        // data.image = this.selectedImage;
        formData.append("image",this.selectedImage);
      }
      // console.log("userset object",this.userset);
      
      // for (var value of formData.values()) {
      //   console.log(value); 
      // }

      // return;
      this.updateUser(formData);
    },
    imageselected(event){
			this.selectedImage = event.target.files[0];
    }
  },
  created(){
    this.user = this.authUser;
    this.userset = this.authUserSet;
    // console.log(this.user.email);
  },
  computed: {
    ...mapGetters(['authUser','authUserSet']),
  },
  updated(){
    
    // console.log("updated",this.user);
  }
};
</script>
