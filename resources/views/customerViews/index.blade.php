<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Customer Dashboard</title>
    
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
      <li class="active">
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
      <li>
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

    <footer>
        <ul class="nav">
        <li class="footer">
            <i class="zmdi account-circle"></i>
            Signed in as {{$custInfo['email']}} 
        </li>
    </ul>
    </footer>

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

      <h5 style="text-align:center">
        <img src="{{asset('customerPP/'.$custInfo['profile_pic'])}}" style="max-height: 150px; max-width: 150px;">
      </h5>
      <h1 style="text-align:center">Welcome {{$custInfo['name']}}!</h1>
      <h5 style="text-align:center">This is your Dashboard.</h5>
      <p><br><br>

        <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">Your Customer ID</th>
                <th scope="col">Account</th>
                <th scope="col">Membership Status</th>
                <th scope="col">Shopping Point</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">{{$custInfo['customer_id']}} </th>
                <td>
                    @if($custInfo['block_status']>0) 
                        blocked
                    @else
                        valid
                    @endif
                </td>
                <td>{{$custInfo['membership_status']}}</td>
                <td>{{$custInfo['shopping_point']}}</td>
              </tr>
            </tbody>
          </table>
      </p>
    </div>

    
  </div>
</div>
<!-- partial -->
  
</body>
</html>
