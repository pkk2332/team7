
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import hh from './components/HomeComponent'
 import mm from './components/ImageComponent'
 import noti from './components/Notification'
 import Vue from 'vue';
 require('./bootstrap');

 window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 const app = new Vue({
 	el:"#app",
 	// created(){
 	// 	Echo.private('id')
 	// 	.listen('Testevent', (e) => {
 	// 		console.log(e);
 	// 	});
 	// },
 	components: {
 		hh,mm,noti
 	}
 });
