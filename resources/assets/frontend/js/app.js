/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../css/app.css');

import Vue from 'vue';

import App from './App.vue';
import Router from './router';
import Navbar from './common/navbar';
import Footer from './common/footer';
import $ from './jquery/jquery.min.js';
import vueScrollto from 'vue-scrollto';

Vue.use(vueScrollto);

window.jQuery = window.$ = require("./jquery/jquery.min.js");

//format money
Vue.filter('formatMoney', (value) => {
  return Number(value)
  .toFixed(2)
  .replace()
})

const app = new Vue({
  el: '#app',
  components: {
    'navbar': Navbar,
    'foot': Footer,
    'page': App
  },
  router: Router

})

// new Vue(Vue.util.extend({ router }, App)).$mount('#app');
