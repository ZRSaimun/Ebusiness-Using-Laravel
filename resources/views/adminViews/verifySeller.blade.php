
 @extends('layouts.adminMain')

@section('content')
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Verify Seller</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">verification</li>
                        </ol>
                        <div id="verify" class="">
                            
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
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>address</th>
                                                <th>phone_no</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>address</th>
                                                <th>phone_no</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @for($i=0; $i < count($seller); $i++)
                                                 @if($seller[$i]['verified'] == 0)
                                                    <tr id="verifySeller{{$seller[$i]['user_id']}}">
                                                        <td>{{$seller[$i]['user_id']}}</td>
                                                        <td>{{$seller[$i]['name']}}</td>
                                                        <td>{{$seller[$i]['email']}}</td>
                                                        <td>{{$seller[$i]['address']}}</td>
                                                        <td>{{$seller[$i]['phone_no']}}</td>
                                                        <td><button   type="button" class="btn btn-success" data-value="{{$seller[$i]['user_id']}}" >Verify</button></td>
                                                    </tr>
                                                    
                                                    @endif 
                                                
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
                               var elementId = `#verifySeller${Id}`;
                           
                                      
                                       $.ajax({  
                                               url:'/admin/SellerVerify',  
                                               method:'get',  
                                               data:{'userId':Id},
                                               contentType: "application/x-www-form-urlencoded",  
                                               success:function(response){ 
                                                   
                                                $(elementId).remove()
                                                    setTimeout(()=> { 
                                                       $('#verify').addClass('alert alert-success')
                                                       $('.alert').append(`${response.success}`);
                                                       setTimeout(() => {
                                                           $('#verify').removeClass('alert alert-success');
                                                           $('#verify').empty();
                                                       }, 1500);
                                                    }, 200);
                                               },  
                                               error:function(response){
                                                   
                                                setTimeout(()=> { 
                                                       $('#verify').addClass('alert alert-success')
                                                       $('.alert').append(`${response.failed}`);
                                                       setTimeout(() => {
                                                           $('#verify').removeClass('alert alert-success');
                                                           $('#verify').empty();
                                                       }, 1500);
                                                    }, 200);
                                               }  
                                           });
                                       
                                   });

                                
                                });
                   

               </script>
                @endSection