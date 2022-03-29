<template>
        <div class="container-fluid">
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="navigation"></i></div>
                                    Orders
                                </h1>
                                <div class="page-header-subtitle">A List of all Orders</div>
                            </div>
                            <div class="col-md-12 text-end">
                                <a class="btn btn-primary p-3" href="#!" data-bs-toggle="modal" data-bs-target="#addOrderModal">Add Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Order Status</th>
                                    <th>Destination</th>
                                    <th class="text-center">Created date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody v-if="orders">
                                <template v-for="(order, index) in orders" :key="order.id">
                                    <tr>
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ order.order_number }}</td>
                                        <td :class="[order.order_status_id != 4 ? 'text-warning': 'text-success' ]">{{ order.order_status.name }}</td>
                                        <td>{{ order.location.name }}</td>
                                        <td class="text-center">{{ order.created_at }}</td>
                                        <td class="text-center"> 
                                            <span class="action-icon" data-bs-toggle="modal" data-bs-target="#allocateTruck" title="Assign Truck" @click="fetchOrder(order.identifier)">Assign <i class="fa-solid fa-truck"></i></span>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="allocateTruck" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="allocateOrderForm" @submit.prevent="allocateOrder(order.identifier)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Allocate A Truck</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 p-4">
                                <p> Please allocate Order Number <strong>{{ order.order_number }}</strong> to a truck for delivery</p>
                                <div class="">
                                    <label for="truckAllocation">Select a Truck</label>
                                    <select name="truck" id="truck" class="form-control" v-model="truckId" @change="fetchTruck(truckId)">
                                        <option selected disabled> --select a truck-- </option>
                                        <option v-for="truck in fleet" :key="truck.id" :value="truck.identifier">{{ truck.registration_number  }}</option>
                                    </select>

                                    <input type="hidden" name="fleet_status" v-model="truck.fleet_status">
                                    <input type="hidden" name="order_status" v-model="order.order_status">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Allocate Truck</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
import { ref, onMounted, reactive } from "vue";
import useOrders from '../../composables/orders';
import useFleet from '../../composables/fleet';

export default {
    setup() {
        
        const form = reactive({
            registration_number: '',
            model: '',
            manufactured_at: '',
        });
        const { order, orders, getOrder, getOrders, updateOrder, errors  } = useOrders();
        const { truck, fleet, getTruck, updateTruck, getFleet } = useFleet();
        const truckId = ref('');

        onMounted(getOrders);
        onMounted(getFleet);

        const fetchOrder = async (id) => {
            await getOrder(id);
        }

        const fetchTruck = async () => {
            let id = truckId.value;
            await getTruck(id);
        }

        const editOrder = async(id) => {
            await updateOrder(id);
            await getOrders();
        }

        const allocateOrder = async(id) => {
            truck.value.fleet_status_id = order.value.order_status_id = 2;

            await updateTruck(truck.value.identifier);
            await updateOrder(order.value.identifier);

            $('#allocateTruck').modal('hide');
            $('#allocateTruck').trigger("reset");

            await getOrders();
        }

        return{
            form,
            truckId,
            order,
            orders,
            fetchTruck,
            truck,
            fleet,
            fetchOrder,
            getOrder,
            getOrders,
            getTruck,
            editOrder,
            allocateOrder,
            errors
        }
        
    }
}
</script>

