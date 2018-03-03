
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
		'page': App
	},
	router: Router

})

// new Vue(Vue.util.extend({ router }, App)).$mount('#app');
