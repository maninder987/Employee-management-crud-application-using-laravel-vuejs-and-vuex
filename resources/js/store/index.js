import Vue from 'vue';
import Vuex from 'vuex';


import getters from './getters';
import mutations from './mutations';
import * as actions from './actions';

Vue.use(Vuex);


export const store = new Vuex.Store({
    modules: {

    },
    state: {
        tableData: [],
    },
    mutations,
    actions,
    getters,
});