require('./bootstrap');
import Vue from 'vue';
import Notification from './components/Notification.vue';

// new Vue({
//     el: '#app',
//     components: {Notification}
// });

Vue.component(
    'Notification',
    require('./components/Notification.vue')
);
