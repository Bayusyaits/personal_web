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
import VueLazyload from 'vue-lazyload';
import $ from './jquery/jquery.min.js';
import vueScrollto from 'vue-scrollto';

Vue.use(vueScrollto);

window.jQuery = window.$ = require("./jquery/jquery.min.js");

//vue lazyload or with options
Vue.use(VueLazyload, {
  lazyComponent: true,
  preLoad: 1.3,
  // the default is ['scroll', 'wheel', 'mousewheel', 'resize', 'animationend', 'transitionend']
  listenEvents: [ 'scroll' ],
  error: 'http://res.cloudinary.com/limononoto/image/upload/v1521294359/personal_web/uploads/icons/error.png',
  loading:'http://res.cloudinary.com/limononoto/image/upload/v1521294360/personal_web/uploads/icons/loading.gif',
  attempt: 1
})


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
