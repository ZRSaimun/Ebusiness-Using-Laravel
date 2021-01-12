
 @extends('layouts.adminMain')

@section('content')
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">reports</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">verification</li>
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
                                                <th>Reporting user</th>
                                                <th>complain for</th>
                                                <th>complain</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Reporting user</th>
                                                <th>complain for</th>
                                                <th>complain</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                                <!-- reporting user -->
                                                @for($i=0; $i < count($report); $i++)
                                                     <tr id="dltReport{{$report[$i]['report_id']}}">
                                                     @for($j=0; $j < count($customer); $j++)
                                                      @if($customer[$j]['user_id'] == $report[$i]['fromuser'])
                                                        <td>{{$customer[$j]['name']}}</td>
                                                        @endif
                                                    @endfor 
                                                    @for($k=0; $k < count($retailer); $k++)
                                                      @if($retailer[$k]['user_id'] == $report[$i]['fromuser'])
                                                        <td>{{$retailer[$k]['name']}}</td>
                                                        @endif
                                                    @endfor
                                            
                                               
                                                    @for($p=0; $p < count($seller); $p++)
                                                      @if($seller[$p]['user_id'] == $report[$i]['fromuser'])
                                                        <td>{{$seller[$p]['name']}}</td>
                                                        @endif
                                                    @endfor
                                                    

                                            <!-- complain for -->
                                                     @for($a=0; $a < count($customer); $a++)
                                                      @if($customer[$a]['user_id'] == $report[$i]['touser'])
                                                        <td>{{$customer[$a]['name']}}</td>
                                                        @endif
                                                    @endfor 
                                                    @for($k=0; $k < count($retailer); $k++)
                                                      @if($retailer[$k]['user_id'] == $report[$i]['touser'])
                                                        <td>{{$retailer[$k]['name']}}</td>
                                                        @endif
                                                    @endfor
                                            
                                               
                                                    @for($p=0; $p < count($seller); $p++)
                                                      @if($seller[$p]['user_id'] == $report[$i]['touser'])
                                                        <td>{{$seller[$p]['name']}}</td>
                                                        @endif
                                                    @endfor
                                                    <td>{{$report[$i]['report_msg']}} </td>

                                            
                                                    <td><button   type="button" class="btn btn-danger" data-value="{{$report[$i]['report_id']}}" >Delete</button></td>
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
                               var elementId = `#dltReport${Id}`;
                             
                           
                                      
                                       $.ajax({  
                                               url:'/admin/report/delete',  
                                               method:'get',  
                                               data:{'userId':Id},
                                               contentType: "application/x-www-form-urlencoded",  
                                               success:function(response){ 
                                                   
                                                $(elementId).remove()
                                                    setTimeout(()=> { 
                                                       $('#dlt').addClass('alert alert-success')
                                                       $('.alert').append(`${response.success}`);
                                                       setTimeout(() => {
                                                           $('#dlt').removeClass('alert alert-success');
                                                           $('#dlt').empty();
                                                       }, 1500);
                                                    }, 200);
                                               },  
                                               error:function(response){
                                                   
                                                alert('your report will be listed')
                                               }  
                                            
                                           });
                                       
                                   });
                                });
                   

               </script>
                @endSection('content')