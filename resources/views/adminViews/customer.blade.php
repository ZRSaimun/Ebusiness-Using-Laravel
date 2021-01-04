@extends('layouts.adminMain')

@section('content')
 
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Customer check</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Customer</li>
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
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Membership status</th>
                                                <th>Points</th>
                                                <th>Phone No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Membership status</th>
                                                <th>Points</th>
                                                <th>Phone No</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            @for($i=0; $i < count($customer); $i++)
                                                    <tr>
                                                        <td>{{$customer[$i]['name']}}</td>
                                                        <td>{{$customer[$i]['email']}}</td>
                                                        <td>{{$customer[$i]['address']}}</td>
                                                        <td>{{$customer[$i]['membership_status']}}</td>
                                                        <td>{{$customer[$i]['shopping_point']}}</td>
                                                        <td>{{$customer[$i]['phone_no']}}</td>
                                                        @if($customer[$i]['block_status'] == 0)
                                                        <td> <a class="btn btn-danger" href="/admin/customer/{{$customer[$i]['name']}}">BAN</a></td>
                                                        @endif
                                                        @if($customer[$i]['block_status'] == 1)
                                                        <td> <a class="btn btn-warning" href="/admin/customer/unban/{{$customer[$i]['name']}}">undo</a></td>
                                                        @endif
                                                </tr>
                                           @endfor  
                                        </tbody>
                                    </table>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
  @endSection