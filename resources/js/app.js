/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue').default;
import { createApp } from 'vue';
import axios from './axios/axios.js';
import store from './store/store.js';
import router from './route/router.js';
import * as func from './helpers/func.js';

import App from './components/App.vue';

window.axios = axios;
window.store = store;
window.func = func;

const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.config.globalProperties.$func = func;
app.use(router);
app.use(store);
// app.component('pagination', require('laravel-vue-pagination'));

app.component('example-component', require('./components/ExampleComponent.vue').default);
app.mount('#app');
