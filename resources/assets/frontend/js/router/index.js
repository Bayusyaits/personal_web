
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from '../views/home/index.vue';

const router = new VueRouter({
	routes: [
	{path: '/', redirect: '/home'},
	{name: 'Home', path: '/home', component: Home}
	]
})

export default router;