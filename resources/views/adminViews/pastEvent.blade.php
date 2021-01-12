@extends('layouts.adminMain')

@section('content')
 
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Past Events</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">event</li>
                        </ol>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>EVENT ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>EVENT ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @for($i=0; $i < count($event); $i++)
                                                <tr>
                                                    <td>{{$event[$i]['event_id']}}</td>
                                                    <td>{{$event[$i]['event_name']}}</td>
                                                    <td>{{$event[$i]['event_description']}} </td>
                                                </tr>
                                        @endfor
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
  @endSection('content')
