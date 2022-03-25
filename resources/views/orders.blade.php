@extends('layout.master')

@section('content')

    
    <main>
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
                                <th>Aircaft reg</th>
                                <th>Engine model</th>
                                <th>Serial number</th>
                                <th class="text-center">Position</th>
                                <th class="text-right">Cycles</th>
                                <th class="text-right">Hours</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($engines as $engine)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $engine->aircraft->aircraft_registration }}</td>
                                    <td>{{ $engine->engine_model->model }}</td>
                                    <td>{{  $engine->serial_number }}</td>
                                    <td class="text-center">{{ $engine->position }}</td>
                                    <td class="text-right">{{ $engine->cycles }}</td>
                                    <td class="text-right">{{ number_format((float)$engine->hours, 2, '.', '') }}</td>
                                    <td>
                                        <a href=""></a>
                                    </td>
                                </tr>
                            @php
                                $i++;
                            @endphp
                            @empty
                                <tr class="text-center">
                                    No engine records found. Add engines to view details.
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
    </main>

@endsection