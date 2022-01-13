require('./bootstrap');

import Vue from 'vue';
import ElementUI from 'element-ui';

import { store } from './store/index.js';

import 'element-ui/lib/theme-chalk/index.css';

import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

// configure language
locale.use(lang)


window.Vue = require('vue').default;
Vue.use(ElementUI);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('employee-form', require('./components/employee/EmployeeForm.vue').default);
Vue.component('employee-list', require('./components/employee/EmployeeList.vue').default);

const app = new Vue({
    store,
    el: '#app',
});