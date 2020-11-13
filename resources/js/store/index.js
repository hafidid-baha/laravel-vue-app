import vuex from 'vuex'
import vue from 'vue'
import Info from "./modules/Info"
import Login from "./modules/Login"
import Back from "./modules/Back"
import axios from "axios"

vue.use(vuex);

// axios.defaults.baseURL = "https://hafid.crmef.website/public/api"

axios.defaults.baseURL = "http://manzak.online/api"

export default new vuex.Store({
    modules:{
        Info,Login,Back
    }
});