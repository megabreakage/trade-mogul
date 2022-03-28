@extends('layout.master')

@section('content')

    <main id="app">
        <router-view />
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
                        <table id="datatablesSimple">
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
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->order_status_id }}</td>
                                        <td>{{ $order->destination_id }}</td>
                                        <td class="text-center">{{ $order->created_at }}</td>
                                        <td class="text-center"> 
                                            <span class="action-icon" title="Assign Truck"><i class="fa-solid fa-truck"></i></span>
                                        </td>
                                    </tr>
                                @php
                                    $i++;
                                @endphp
                                @empty
                                    <tr class="text-center">
                                        No orders found. Add orders to view details.
                                    </tr>
                                @endforelse
                                
    
                            </tbody>
                        </table>
    
                        <div class="col-md-12">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <p><strong>Opps Something went wrong</strong></p>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection