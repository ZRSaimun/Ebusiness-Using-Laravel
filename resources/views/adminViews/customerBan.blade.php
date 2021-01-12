@extends('layouts.adminMain')

@section('content')
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><strong><u>BAN CUSTOMER</u></strong> </h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Customer Banning for 1 day</div>
                                        <form method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="small mb-1">Name</label>
                                                <input class="form-control py-4"  type="name" placeholder="Name" readonly value="{{$customer[0]['name']}}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Membership Status</label>
                                                <input class="form-control py-4" type="edescription" readonly placeholder="Description" value="{{$customer[0]['membership_status']}}" />
                                            </div>
                                            
                                                <label class="small mb-1" >Shopping Points</label>
                                                <input class="form-control py-4" type="text" readonly value="{{$customer[0]['shopping_point']}}"/>
                                        
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-warning">Ban</button>
                                            </div>
                                        </form>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>

@endSection