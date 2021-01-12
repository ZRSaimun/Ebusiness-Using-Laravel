@extends('layouts.adminMain')

@section('content')
 
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Retail Manager List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Retail Manager</li>
                        </ol>

                        <div id="dlt" class="">
                            
                        </div>
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
                                                <th>Action</th>
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
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @for($i=0; $i < count($retail); $i++)
                                                <tr id="dlt{{$retail[$i]['user_id']}}">
                                                    <td>{{$retail[$i]['name']}}</td>
                                                    <td>{{$retail[$i]['email']}}</td>
                                                    <td>{{$retail[$i]['address']}}</td>
                                                    <td>{{$retail[$i]['dob']}}</td>
                                                    <td>{{$retail[$i]['phone_no']}}</td>
                                                    <td>{{$retail[$i]['level']}}</td>
                                                    <td><input id="dltRetail{{$retail[$i]['user_id']}}"  type="button" class="btn btn-danger" data-value="{{$retail[$i]['user_id']}}" value="Delete"\></td>
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
                                    $('input').click(function (e) {
                                            var Id =$(this).data("value");
                                            var elementId = `#dlt${Id}`;
                                            
                                       
                                        $.ajax({  
                                                url:'/admin/retailManager/delete',  
                                                method:'get',  
                                                data:{'userId':Id},
                                                contentType: "application/x-www-form-urlencoded",  
                                                success:function(response){ 
                                                    $(elementId).remove();
                                                     setTimeout(()=> { 
                                                        $('#dlt').addClass('alert alert-warning')
                                                        $('.alert').append(`${response.success}`);
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
  @endSection('content')