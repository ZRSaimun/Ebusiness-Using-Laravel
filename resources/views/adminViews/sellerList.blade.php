@extends('layouts.adminMain')

@section('content')
 
    
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Seller List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">seller</li>
                        </ol>

                        <div id="dlt" class="">
                            
                        </div>
                        
                        <!-- <div class="alert alert-success" role="alert">
                            A simple success alert—check it out!
                          </div> -->
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Date of Birth</th>
                                                <th>phone No</th>
                                                <th>level</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Date of Birth</th>
                                                <th>phone No</th>
                                                <th>level</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @for($i=0; $i < count($seller); $i++)
                                                <tr id="dlt{{$seller[$i]['seller_id']}}">
                                                    <td>{{$seller[$i]['name']}}</td>
                                                    <td>{{$seller[$i]['email']}}</td>
                                                    <td>{{$seller[$i]['address']}}</td>
                                                    <td>{{$seller[$i]['dob']}}</td>
                                                    <td>{{$seller[$i]['phone_no']}}</td>
                                                    <td>{{$seller[$i]['level']}}</td>
                                                    
                                                    <td><input id="dltSeller{{$seller[$i]['user_id']}}"  type="button" class="btn btn-danger" data-value="{{$seller[$i]['user_id']}}" value="Delete"\></td>

                                            
                                                        @if($seller[$i]['block_status']==0)
                                                             <td><button id="blockSeller{{$seller[$i]['user_id']}}"  type="button" class="btn btn-warning" data-value="{{$seller[$i]['user_id']}}">block</button></td>
                                                        @endif

                                                        @if($seller[$i]['block_status']==1)
                                                            <td><button id="blockSeller{{$seller[$i]['user_id']}}"  type="button" class="btn btn-warning" data-value="{{$seller[$i]['user_id']}}">Unblock</button></td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


                <script>
                     $(document).ready(function() {
                     
                            $('button').click(function (e) {
                                var Id =$(this).data("value") 
                                var elementId = `#blockSeller${Id}`;
                                       
                                        $.ajax({  
                                                url:'/admin/seller/blocking',  
                                                method:'get',  
                                                data:{'userId':Id},
                                                contentType: "application/x-www-form-urlencoded",  
                                                success:function(response){ 
                                                    $(elementId).html(`${response.success}`)
                                                    
                                                },  
                                                error:function(response){  
                                                    alert('server error occured')  
                                                }  
                                            });
                                        
                                    });

                                    $('input').click(function (e) {
                                            var Id =$(this).data("value") 
                                            var elementId = `#dlt${Id}`;
                                            
                                       
                                        $.ajax({  
                                                url:'/admin/seller/delete',  
                                                method:'post',  
                                                data:{'userId':Id},
                                                contentType: "application/x-www-form-urlencoded",  
                                                success:function(response){ 
                                                    
                                                    $(elementId).remove()
                                                     setTimeout(()=> { 
                                                        $('#dlt').addClass('alert alert-warning')
                                                        $('.alert').append(`${response.sd}`);
                                                        setTimeout(() => {
                                                            $('.alert').remove();
                                                        }, 1500);
                                                     }, 200);
                                                },  
                                                error:function(response){  
                                                    alert(response.sd)  
                                                }  
                                            });
                                        
                                    });
                                 });
                    

                </script>
 @endSection