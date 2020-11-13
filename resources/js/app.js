/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Vue from "vue";
import { BootstrapVue } from "bootstrap-vue";
import store from "./store";
import router from "./router";
// Install BootstrapVue
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import vuex from "vuex";

Vue.use(BootstrapVue);
Vue.use(vuex);

const app = new Vue({
    store,
    router,
    el: "#app"
});
