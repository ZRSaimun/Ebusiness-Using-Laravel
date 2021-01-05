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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><strong><u>ADD AN EVENT</u></strong> </h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Add an amaizing event.</div>
                                        <form method="POST">
                                        @csrf
                                            <div class="form-group">
                                                <label class="small mb-1">Name</label>
                                                <input class="form-control py-4"  type="text" name="name" placeholder="Event Name" value="{{old('name')}}" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Description</label>
                                                <input class="form-control py-4" type="text" name="description" placeholder="Description" value="{{old('description')}}" />
                                            </div>
                                                    <div class="alert alert-warning">
                                                        @foreach($errors->all() as $err)
                                                            {{$err}} <br>
                                                        @endforeach
                                                        </div>
                                          
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Confirm</button>
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

    @endSection('content')

