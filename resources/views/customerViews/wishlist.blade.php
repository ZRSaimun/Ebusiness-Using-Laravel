<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Wishlist</title>
    
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
      <li class="active">
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
      <h5 style="text-align:center">Products that you have wishlisted.</h5>
      <p>
        <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">#Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Check</th>
              </tr>
            </thead>

            <tbody>
                    @php 
                        $hash = 0;
                    @endphp 

                    @foreach ($list as $std) 
                        @php $hash++ @endphp
                        <tr>
                            <td>{{ $hash }}</td>
                            <td>{{ $std->product_id }}</td>

                                @foreach ($prodlist as $c)
                                    @if($c->product_id == $std->product_id)
                                            <td>{{ $c->product_name }}</td>
                                    @endif 
                                @endforeach 

                            <td>
                                <a href="/viewproduct/{{ $std->product_id }}">View </a>|
                                <a href="/remove_from_wishlist/{{ $std->product_id }}">Remove </a>
                            </td>
                        </tr>
                    @endforeach 
            </tbody>
          </table>
      </p><br>

      <h4 style="text-align:left">Search Products</h4>
      <input class="form-control" type="text" name="search" id="search" placeholder="Search" aria-label="Search">
      <br>

      <table class="table table-sm"> 
            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Check</th>
                
              </tr>
            </thead>
        <tbody id="temporary-table">

        </tbody>
      </table>

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
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script type="text/javascript">

  $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            console.log(query);
            $.ajax({
              method:'GET',
              url:"/search_product_ajax",
              dataType:'json',
              data:{
                query:query,
              },
              success: function(res){
                //console.log(res);
                var tableRow ='';
                $('#temporary-table').html('');
                $.each(res,function(index,value){
                  //console.log(index);
                  //console.log("Break");
                
                  const parsed = JSON.parse(JSON.stringify(value));
                  console.log(parsed[0].price);

                  //console.log(JSON.stringify(value));
              
              tableRow ='<tr><td>'+parsed[0].product_name+'</td><td>'+parsed[0].price+'</td><td><a href="/viewproduct/'+parsed[0].product_id+'">view</a></td></tr>'; 

            
              $('#temporary-table').append(tableRow);
             
          });
        }
     });       
  });

      
</script>

</body>
</html>
