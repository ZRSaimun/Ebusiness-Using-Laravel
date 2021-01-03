<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Wishlist</title>
    
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     --><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
    <link rel="stylesheet" href="/public/css/customer.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <img src="/public/logo.png" height="50" weight="70">
    </header>
    <ul class="nav">
      <li>
        <a href="/customer">
          <i class="zmdi zmdi-view-dashboard"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="/customer/pending_order">
          <i class="zmdi zmdi-view-list-alt"></i> Pending Orders
        </a>
      </li>
      <li>
        <a href="/customer/order_history">
          <i class="zmdi zmdi-check-all"></i> Order History
        </a>
      </li>
      <li class="active">
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
        <h5 style="text-align:center">Products you are willing to buy.</h5>
        <br><br>
        <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Change</th>
              </tr>
            </thead>

            <tbody>
                <% 
                    var hash = 0;
                    var total = 0;

                    list.forEach(std=>{ hash++; %>
                    <tr>
                        <td><%= hash %></td>

                            <% prod.forEach(c=>{%>
                                <% 
                                    if(c.product_id==std.product_id){ 
                                        var temp = 0;
                                        temp = std.quantity * c.price; 
                                        total = total + temp;
                                %>
                                        <td><%= c.product_name %></td>
                                        <td><%= std.quantity %></td>
                                        <td><%= temp %></td>
                                <% }; %> 
                            <% }); %> 


                        <td>
                            <a href="/customer/remove_from_cart/<%= std.cart_id %>">Remove </a>
                        </td>
                    </tr>
                <% }); %> 
            </tbody>
          </table><br><br>

        <form method="post">  
                <div  class="col-sm-10">
                    <h4 class="d-inline-block"><b>Total Price: </b><%= total %></h4>
                </div> 
                <div class="col-sm-2">
                    <button onclick="document.location='/customer/cart/<%= custid %>'" type="button" class="d-inline-block btn btn-primary">Confirm and Order</button>
                </div>
        </form>
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
