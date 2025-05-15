require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';

// auto register components
const requireComponent = require.context('./components', true, /\.vue$/);

requireComponent.keys().forEach(fileName => {
  const componentConfig = requireComponent(fileName);
  const componentName = fileName
    .split('/')
    .pop()
    .replace(/\.\w+$/, '');
  Vue.component(componentName, componentConfig.default || componentConfig);
});

Vue.use(require('vue-moment'));

import { BootstrapVue } from 'bootstrap-vue'
Vue.use(BootstrapVue)

import VueTimeago from 'vue-timeago'
Vue.use(VueTimeago, {
  name: 'Timeago',
  locale: 'en',
  converter(date, locale, { includeSeconds, addSuffix = true }) {
    const distanceInWordsStrict = require('date-fns/distance_in_words_strict')
    return distanceInWordsStrict(Date.now(), date, { locale, addSuffix, includeSeconds });
  }
});

import swal from 'sweetalert2';
window.Swal = swal;

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, { timeout: 7000 })

import vSelect from "vue-select";
Vue.component("v-select", vSelect);

import moment from 'moment';

Vue.mixin({
  methods: {

    formatDateMoment(inputDate) {
      return moment(String(inputDate)).format('D MMMM YYYY HH:mm:ss')
    },

    getStatusClass(status) {
      if (!status) return null;
      if (status >= 300 && status < 400) return 'status_3xx';
      else if (status >= 400 && status < 500) return 'status_4xx';
      else if (status >= 500 && status < 600) return 'status_5xx';
      else return null;
    },

    customAlert(text) {

      Swal.fire({
        title: text,
        showConfirmButton: false,
        showDenyButton: false,
        showCancelButton: true,
        focusConfirm: false,
        cancelButtonText: 'Ok',
        customClass: { title: "popup-title" },
      })

    },

  }
});

new Vue({
  el: '#app',
});

