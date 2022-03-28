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
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reg Number</th>
                                    <th>Status</th>
                                    <th>Destination</th>
                                    <th class="text-center">Created date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template >
                                    
                                </template>

                            </tbody>
                        </table>

                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>