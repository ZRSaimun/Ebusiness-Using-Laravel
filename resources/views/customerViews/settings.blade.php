<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Account Settings</title>
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
    <link rel="stylesheet" href="{{asset('customerStatic/css/customer.css')}}">
    

</head>
<body>
<!-- partial:index.partial.html -->
<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <!-- <a href="#">My App</a> -->
      <img src="{{asset('ebazarLogo.png')}}" height="50" weight="70">
    </header>
    <ul class="nav">
      <li>
        <a href="{{route('customer.index')}}">
          <i class="zmdi zmdi-view-dashboard"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="{{route('customer.pending_orders')}}">
          <i class="zmdi zmdi-view-list-alt"></i> Pending Orders
        </a>
      </li>
      <li>
        <a href="{{route('customer.order_history')}}">
          <i class="zmdi zmdi-check-all"></i> Order History
        </a>
      </li>
      <li>
        <a href="{{route('customer.cart')}}">
          <i class="zmdi zmdi-shopping-cart"></i> Cart
        </a>
      </li>
      <li>
        <a href="{{route('customer.wishlist')}}">
          <i class="zmdi zmdi-collection-plus"></i> Wishlist
        </a>
      </li>
      <li class="active">
        <a href="{{route('customer.settings')}}">
          <i class="zmdi zmdi-settings"></i> Account Settings
        </a>
      </li>
      <li>
        <a href="{{route('customer.report')}}">
          <i class="zmdi zmdi-info-outline"></i> Report a problem
        </a>
      </li>
    </ul>



  </div>
  <!-- Content -->
  <div id="content">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#"></a>
            </a>
          </li>
          <li><a href="/logout"><i class="zmdi zmdi-power"></i> logout</a></li>
        </ul>
      </div>
    </nav>


    <div class="container-fluid">
      <h4 style="text-align:center">Update account info.</h4>
      
      <h5 style="text-align:left" id="msg"></h5>
      <br>
      
      @if (count($errors) > 0)
      <h5 align="center" style="color: red">
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('msg') }}</strong>
            </div>
      </h5>
      @endif

        <form method="post"> 
            <div class="form-group">
                <label for="formGroupExampleInput2">Full Name</label>
                 <input type="text" class="form-control" id="formGroupExampleInput2" name="name" value="{{ $info['name'] }}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Address</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="address" value="{{ $info['address'] }}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Date of Birth</label>
                <input class="form-control" type="date" name="dob" value="{{ $info['dob'] }}" id="example-date-input">
            <div><br>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone Number</label>
                <input class="form-control" type="tel" name="phoneno" value="{{ $info['phone_no'] }}" id="example-tel-input">
            <div><br>  
            <div class="form-group">
                <label for="formGroupExampleInput2">Change Profile Picture</label>
                <input class="form-control" type="file" name="image" id="example-tel-input">
            <div><br> 
            <div  class="form-group col-sm-offset-11 col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>       

        </form>
      <br><br>
    </div>

    
  </div>
</div>
<!-- partial -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="twitter-bootstrap-v2/docs/assets/js/jquery.js"></script>
<script src="twitter-bootstrap-v2/docs/assets/js/bootstrap-alert.js"></script>
  
</body>
</html>
