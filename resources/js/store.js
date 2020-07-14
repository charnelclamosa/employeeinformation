import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    token: 'FALSE',
    user: {}
  },
  mutations: {
    AUTH_SUCCESS: (state, payload) => {
      (state.token = 'TRUE'),
      (state.user = payload)
    },
    AUTH_CLEAR: (state, payload) => {
      (state.token = 'FALSE'),
      (state.user = [])
    }
  },
  actions: {
    authSuccess: (context, payload) => {
      context.commit('AUTH_SUCCESS', payload)
    },
    authClear: (context, payload) => {
      context.commit('AUTH_CLEAR', payload)
    }
  },
  getters: {
    getUser: state => state.user
  },
  plugins: [
    createPersistedState()
  ]
})
