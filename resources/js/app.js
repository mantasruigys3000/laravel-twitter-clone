/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import vrouter from 'vue-router';

Vue.use(vrouter);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('post-input', require('./components/Post_input.vue').default);
Vue.component('user-navbar', require('./components/User_Navbar.vue').default);
Vue.component('upload_image', require('./components/upload_image.vue').default);
Vue.component('userprofile', require('./components/profile_page.vue').default);
Vue.component('postfeed', require('./components/postfeed.vue').default);
Vue.component('profilesearch', require('./components/profilesearch.vue').default);
Vue.component('main-app', require('./components/app.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
    {path: '/', name: 'home', component: require('./components/home').default},
    {path: '/profile/:userid?', name: 'profile', component: require('./components/profile').default},

]

const router = new vrouter({
    routes,
})

const app = new Vue({
    el: '#app',
    router
});
