@extends('layouts.adminMain')

@section('content')
 
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Order List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">List</li>
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
                                                <th>Order ID</th>
                                                <th>customer Id</th>
                                                <th>Product ID</th>
                                                <th>Quantity</th>
                                                <th>Order Status</th>
                                                <th>Date</th>
                                                <th>Seller revenue</th>
                                                <th>Company revenue</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>customer Id</th>
                                                
                                                <th>Product ID</th>
                                                <th>Quantity</th>
                                                <th>Order Status</th>
                                                <th>Date</th>
                                                <th>Seller revenue</th>
                                                <th>Company revenue</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @for($i=0; $i < count($order); $i++)
                                                <tr>
                                                    <td>{{$order[$i]['order_id']}}</td>
                                                    @for($j=0; $j < count($customer); $j++)
                                                        @if($customer[$j]['customer_id']==$order[$i]['customer_id'])
                                                                <td>{{$customer[$j]['name']}}></td>
                                                           @endif
                                                        
                                                        @endfor

                                                    
                                                       
                                                        
                                                        @for($k=0; $k < count($product); $k++)
                                                        @if($product[$k]['product_id']==$order[$i]['product_id'])
                                                                <td>{{$product[$k]['product_name']}}</td>
                                                           @endif
                                                        
                                                        @endfor
                                                   
                                                    <td>{{$order[$i]['quantity']}}</td>
                                                    <td>{{$order[$i]['order_status']}}</td>
                                                    <td>{{$order[$i]['date']}}</td>
                                                    <td>{{$order[$i]['seller_revenue']}}</td>
                                                    <td>{{$order[$i]['company_revenue']}} </td>
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