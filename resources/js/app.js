require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from "vue";
import router from "./router";

import FleetList from './components/fleet/FleetList.vue';
import OrdersList from './components/orders/OrdersList.vue';

window.Alpine = Alpine;
Alpine.start();

createApp({
    components: {
        FleetList,
        OrdersList,
    }
}).use(router).mount('#app');
