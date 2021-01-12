@extends('layouts.adminMain')

@section('content')
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Product List</h1>
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

                            <!-- search -->
                            <!-- <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
                                </div>
                            </div> -->
                            <!-- search end -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>catagory</th>
                                                <th>Quantity</th>
                                                <th>Description</th>
                                                <th>price</th>
                                                <th>owner</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>catagory</th>
                                                <th>Quantity</th>
                                                <th>Description</th>
                                                <th>price</th>
                                                <th>owner</th>
                                        
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @for($i=0; $i < count($product); $i++)
                                                
                                              
                                                <tr>
                                                    <td>{{$product[$i]['product_name']}}</td>

                                                    @for($j=0; $j < count($catagory); $j++)
                                                        
                                                        @if($catagory[$j]['catagory_id'] == $product[$i]['catagory_id'])
                                                            <td>{{$catagory[$j]['catagory_name']}}</td>
                                                            
                                                            @endif
                                                   @endfor 

                                                    <td>{{$product[$i]['quantity']}}</td>
                                                    <td>{{$product[$i]['description']}}</td>
                                                    <td>{{$product[$i]['price']}}</td>
                                                   
                                                    @for($k=0; $k < count($seller); $k++)
                                                        @if($seller[$k]['user_id'] == $product[$i]['user_id'])
                                                            <td>{{$seller[$j]['name']}}</td>
                                                        @endif
                                                     @endfor 
                                                     @for($p=0; $p< count($retailer); $p++)
                                                        @if($retailer[$p]['user_id'] == $product[$i]['user_id'])
                                                            <td>{{$retailer[$p]['name']}}</td>
                                                        @endif
                                                     @endfor
                                                    
                                                        
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