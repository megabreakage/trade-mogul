import { createRouter, createWebHistory } from "vue-router";
import FleetList from '../components/fleet/FleetList.vue';
import OrdersList from '../components/orders/OrdersList.vue';

const routes = [
    {
        path: '/fleet',
        name: 'fleet.list',
        component: FleetList,
    }, {
        path: '/orders',
        name: 'orders.list',
        component: OrdersList,
    }
];

export default createRouter({
    history:createWebHistory(),
    routes
});