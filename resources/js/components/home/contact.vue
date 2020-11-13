<template>
    <div class="container">
        <Header title="Contact Me" />
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form class="mt-3">
                    <div class="form-group">
                        <label for="projectname">Full Name</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Please Enter Your FullName"
                            v-model="fullname"
                        />
                    </div>
                    <div class="form-group">
                        <label for="projectdesc">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Put Your Email Here To Get a Feedback"
                            v-model="email"
                        />
                    </div>
                    <div class="form-group">
                        <label for="projectcouse">Message</label>
                        <textarea
                            class="form-control"
                            placeholder="Add Your Message"
                            v-model="message"
                            rows="10"
                        ></textarea>
                    </div>
                    <div class="form-group">
                        <button
                            @click.prevent="sendMessage"
                            class="btn btn-login"
                        >
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import Header from "../Header.vue"
export default {
    name: "contact",
    components:{
        Header
    },
    data(){
        return{
            fullname:'',
            email:'',
            message:''
        }
    },
    methods:{
        sendMessage(){
            if(this.fullname!=''&&this.email!=''&&this.message!=''){
                alert('your message is ready to be send');
            }else{
                alert('Please Fill All The User Information');
            }
        }
    }
};
</script>
