<template>
        <div class="container-fluid">
            <div class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="navigation"></i></div>
                                    Fleet
                                </h1>
                                <div class="page-header-subtitle">A List of all Trucks and their Status</div>
                            </div>
                            <div class="col-md-12 text-end">
                                <a class="btn btn-primary p-3" href="#!" data-bs-toggle="modal" data-bs-target="#addOrderModal">Add a Truck</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Fleet</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reg Number</th>
                                    <th>Status</th>
                                    <th>Model</th>
                                    <th class="text-center">Created date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody v-if="fleet">
                                <template v-for="(truck, index) in fleet" :key="truck.id">
                                    <tr>
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ truck.registration_number }}</td>
                                        <td :class="truck.fleet_status_id == 1 ? 'text-success': 'text-primary'">{{ truck.fleet_status.name }}</td>
                                        <td>{{ truck.model }}</td>
                                        <td class="text-center">{{ truck.manufactured_at }}</td>
                                        <td class="text-center"> 
                                            <span class="action-icon" title="Update Truck Status" data-bs-toggle="modal" data-bs-target="#updateStatus" @click="fetchTruck(truck.identifier)"><i class="fa-regular fa-clipboard"></i> Update Status </span>
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
        <div class="modal fade" id="updateStatus" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="allocateOrderForm" @submit.prevent="updateTruckStatus(truck.identifier)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Update Truck status</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 p-4">
                                <div class="">
                                    <label for="truckAllocation">Select status</label>
                                    <select name="truck" id="truck" class="form-control" v-model="statusId" @change="fetchStatus(statusId)">
                                        <option selected disabled> --select status-- </option>
                                        <option v-for="status in statuses" :key="status.id" :value="status.identifier">{{ status.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Update Truck Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
import { onMounted, reactive, ref } from "vue";
import useFleet from '../../composables/fleet';
import useFleetStatuses from '../../composables/fleetStatuses';

export default {

    setup() {
        const form = reactive({
            registration_number: '',
            location: '',
            model: '',
            manufactured_at: ''
        })

        const statusId = ref('')

        const { fleet, getFleet, truck, getTruck, updateTruck, errors } = useFleet();
        const { status, statuses, getStatus, getStatuses } = useFleetStatuses();

        onMounted(getFleet);
        onMounted(getStatuses);

        const editOrder = async (id) => {
            await updateTruck(id);
            await getFleet();
        }

        const fetchStatus = async(id) => {
            await getStatus(id);
        }

        const fetchTruck = async(id) => {
            await getTruck(id);
        }

        const updateTruckStatus = async(id) => {
            truck.value.fleet_status_id = status.value.id;
            console.log(truck.value);
            await updateTruck(id);

            $('#updateStatus').modal('hide');
            $('#updateStatus').trigger("reset");

            await getFleet();
        }

        return {
            form,
            fleet,
            truck,
            getFleet,
            editOrder,
            fetchStatus,
            fetchTruck,
            status,
            statuses,
            updateTruckStatus,
            statusId,
            errors,
        }
        
    },
}
</script>