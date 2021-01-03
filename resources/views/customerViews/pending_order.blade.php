<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Pending Orders</title>
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
    <link rel="stylesheet" href="/public/css/customer.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <!-- <a href="#">My App</a> -->
      <img src="/public/logo.png" height="50" weight="70">
    </header>
    <ul class="nav">
      <li>
        <a href="/customer">
          <i class="zmdi zmdi-view-dashboard"></i> Dashboard
        </a>
      </li>
      <li class="active">
        <a href="/customer/pending_order">
          <i class="zmdi zmdi-view-list-alt"></i> Pending Orders
        </a>
      </li>
      <li>
        <a href="/customer/order_history">
          <i class="zmdi zmdi-check-all"></i> Order History
        </a>
      </li>
      <li>
        <a href="/customer/cart">
          <i class="zmdi zmdi-shopping-cart"></i> Cart
        </a>
      </li>
      <li>
        <a href="/customer/wishlist">
          <i class="zmdi zmdi-collection-plus"></i> Wishlist
        </a>
      </li>
      <li>
        <a href="/customer/settings">
          <i class="zmdi zmdi-settings"></i> Account Settings
        </a>
      </li>
      <li>
        <a href="/customer/report_problem">
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
      <h5 style="text-align:center">Here is your pending orders</h5>
      <p><br><br>
        <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#Order ID</th>
                <th scope="col">#Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Ordered Quantity</th>
                <th scope="col">Date Ordered</th>
                <th scope="col">Change</th>
              </tr>
            </thead>
        
            <tbody>
                <% list.forEach(std=>{ console.log(std.order_id); %>
                    <tr>
                        <td><%= std.order_id %></td>
                        <td><%= std.product_id %></td>

                            <% prod.forEach(c=>{%>
                                <% if(c.product_id==std.product_id){%>
                                        <td><%= c.product_name %></td>
                                    <% }; %> 
                            <% }); %> 

                        <td><%= std.quantity %></td>
                        <td><%= std.date %></td>
                        <td><a href="/customer/cancelorder/<%= std.order_id %>">Cancel</a></td>
                    </tr>
                <%}); %> 
            </tbody>
          </table>
      </p>
      
      <div  class="form-group col-sm-offset-10 col-sm-20">
        <button onclick="window.print();" class="btn btn-primary">Print Report</button>
    </div>
    </div>

    
  </div>
</div>
<!-- partial -->

<footer>
    <ul class="nav">
        <li class="footer">
         
        </li>
    </ul>
</footer>
  
</body>
</html>
