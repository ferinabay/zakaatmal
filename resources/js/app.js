require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import IndexComponent from './components/users/Index.vue';
import RegisterComponent from './components/users/Register.vue';
import CreateComponent from './components/users/Create.vue';
import HitungZakatComponent from './components/users/HitungZakat.vue';


const routes = [{
        name: 'users',
        path: '/',
        component: IndexComponent
    },
    {
        name: 'register',
        path: '/register',
        component: RegisterComponent
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        name: 'hitungZakat',
        path: '/',
        component: HitungZakatComponent
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
