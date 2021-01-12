<<<<<<< HEAD:resources/views/retailseller/productListEdit.blade.php
<!doctype html>
<html lang="en">

<head>
    <title>Retail retailseller | Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>

</head>


<body>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost:8000/retailseller/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


    <div class="wrapper d-flex align-items-stretch">


        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <div align="center">
                <span align="center">
                    <h3>Edit Products</h3>
                </span>
                <table class="table" border="1px" style="width:70%;height:80%">
                    <tr>
                        <th width="10%">Image</th>
                        <th width="30%">productID</th>
                        <th width="30%">Name</th>
                        <th width="30%">Quantity</th>
                        <th width="20%">price</th>
                        <th width="20%">Catagory</th>
                        <th width="30%">Rating</th>
                        <th width="30%">Description</th>
                        <th width="30%">Published</th>
                        <th width="30%">exclusive</th>
                        <th width="20%">Action</th>
                    </tr>

                    @foreach ($product as $items)
                    <tr>
                        <td>
                            <img align="center" src="/upload/{{$items['product_img']}}" alt="logo" height="100px"
                                width="100px" />
                        </td>
                        <td>
                            <a href="/retailseller/detailProduct/{{$items['product_id']}}">
                                {{$items['product_id'] }}
                            </a>

                        </td>
                        <td>
                            {{$items['product_name']}}
                        </td>
                        <td>
                            {{$items['quantity']}}
                        </td>
                        <td>
                            {{$items['price']}}
                        </td>
                        <td>
                            {{$items['catagory_id']}}
                        </td>
                        <td>
                            {{$items['average_rating']}}
                        </td>
                        <td>
                            <span>
                                {{$items['description']}}
                            </span>

                        </td>
                        <td>
                            {{$items['published']}}
                        </td>
                        <td>
                            {{$items['exclusive']}}
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#deleteProductID{{$items['product_id']}}">Edit
                            </a>
                        </td>
                        <td>
                            <div class="modal fade" id="deleteProductID{{$items['product_id']}}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" enctype="multipart/form-data" id="editForm">
                                                {{csrf_field()}}

                                                <table width="50%" align="center"
                                                    style="border-collapse: separate;border-spacing: 0 8px">
                                                    <tr>
                                                        <td width="45%">Product Name</td>
                                                        <td width="10%">:</td>
                                                        <td width="45%">
                                                            <input type="text" name="name" id="name"
                                                                value="{{$items['product_name']}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45%">Quntity</td>
                                                        <td width="10%">:</td>
                                                        <td width="45%">
                                                            <input type="number" name="quantity" id="quantity"
                                                                value="{{$items['quantity']}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45%">Product price</td>
                                                        <td width="10%">:</td>
                                                        <td width="45%">
                                                            <input type="number" name="price" id="price"
                                                                value="{{$items['price']}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45%">Catagory</td>
                                                        <td width="10%">:</td>
                                                        <td width="45%">
                                                            <select name="catagory" id="catagory">
                                                                @foreach ($catagoryID as $item)
                                                                <option value="{{ $item->catagory_name}}">
                                                                    {{ $item->catagory_name}}
                                                                </option>
                                                                @endforeach
                                                            </select>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Description</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" name="description" id="description"
                                                                value="{{$items['description']}}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Exclusive</td>
                                                        <td>:</td>
                                                        <td>
                                                            <select name="exclusive" id="exclusive">
                                                                <option value="ttttt">Yes</option>
                                                                <option value="ffff">No</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Image</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="file" name="myImg"
                                                                value="/upload/{{$items['product_img']}}"
                                                                accept="image/*" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <input type="hidden" name="productID" id="productID"
                                                            value="{{$items['product_id']}}">
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No</button>
                                                                <button id="btn" type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @if(Session::has('status'))
                <div class="alert alert-success" role="alert" style="width:20%">
                    {{ Session::get('status') }}
                    <P id="result"></P>
                </div>
                @endif
            </div>
        </div>





        <!-- MODALLLLLLL-->

        <!-- Modal -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
            crossorigin="anonymous"></script>
        <script src=" /js/jquery.min.js "></script>
        <script src=" /js/popper.js "></script>
        <script src=" /js/bootstrap.min.js "></script>
        <script src=" /js/main.js "></script>

        <script>
        $('#editForm').submit(function(e) {
            e.preventDefault();
            //alert("ajax clicked");

            let product_id = $('#productID').val();
            alert(product_id);
            let name = $('#name').val();
            let quantity = $('#quantity').val();
            let price = $('#price').val();
            let catagory = $('#catagory').val();
            let description = $('#description').val();
            let exclusive = $('#exclusive').val();
            let __token = $("input[name=__token]").val();
            alert("ajax clicked done");
            $.ajax({
                type: "POST",
                url: "{{route('editPP')}}",
                datatype: json,
                data: {
                    product_id: product_id,
                    name: name,
                    quantity: quantity,
                    price: price,
                    catagory: catagory,
                    description: description,
                    exclusive: exclusive,
                    __token: __token
                },
                success: function(data) {
                    console.log(data);
                    alert(data);
                    if (response) {
                        $('#result').append("success");
                    }
                }

            });
        });
        </script>











        <!-- 

        jQuery(document).ready(function() {
        jQuery('#editForm').click(function(e) {
        e.preventDefault();
        alert("ajaxxx");
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });
        jQuery.ajax({
        url: "{{ url('productEdit') }}",
        method: 'post',
        data: {
        product_id: $($productID).val(),
        name: $($name).val(),
        quantity: $($quantity).val(),
        price: $($price).val(),
        catagory: $($catagory).val(),
        description: $($description).val(),
        exclusive: $($exclusive).val(),
        },
        success: function(result) {
        console.log(result);
        }
        });
        });
        }); -->



</body>

=======
<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>

</head>


<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="/seller">Profile</a>
                    </li>
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Products</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="/seller/addProduct">Add Product</a>
                            </li>
                            <li>
                                <a href="/seller/deleteProduct">Delete Product</a>
                            </li>
                            <li>
                                <a href="/seller/editProduct">Edit Deatils</a>
                            </li>
                            <li>
                                <a href="/seller/addCoupon">Add Coupon</a>
                            </li>
                            <li>
                                <a href="/seller/addCatagory">Add Catagory</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#noSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Publish Product</a>
                        <ul class="collapse list-unstyled" id="noSubmenu">
                            <li>
                                <a href="/seller/publishedProduct">Published Product</a>
                            </li>
                            <li>
                                <a href="/seller/unpublishedProduct">Unpublished Product</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Sells</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="/seller/reviewProduct">Review</a>
                            </li>
                            <li>
                                <a href="/seller/totalIncome">Sells Analysis</a>
                            </li>
                            <li>
                                <a href="/seller/reportCustomer">Report Customer</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#nooSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Orders</a>
                        <ul class="collapse list-unstyled" id="nooSubmenu">
                            <li>
                                <a href="/seller/pendingOrders">Pending Orders</a>
                            </li>
                            <li>
                                <a href="/seller/deliverdOrders">Deliverd Orders</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href="#">Payment</a>
                    </li>
                    <li>
                        <a href="/logout">LogOut</a>
                    </li>
                </ul>

                <div class="footer">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved <i class="icon-heart" aria-hidden="true"></i> by <a href="Auml@n"
                            target="_blank">Auml@n</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <div align="center">
                <span align="center">
                    <h3>Edit Products</h3>
                </span>
                <table class="table" border="1px" style="width:70%;height:80%">
                    <tr>
                        <th width="10%">Image</th>
                        <th width="30%">productID</th>
                        <th width="30%">Name</th>
                        <th width="30%">Quantity</th>
                        <th width="20%">price</th>
                        <th width="20%">Catagory</th>
                        <th width="30%">Rating</th>
                        <th width="30%">Description</th>
                        <th width="30%">Published</th>
                        <th width="30%">exclusive</th>
                        <th width="20%">Action</th>
                    </tr>

                    @foreach ($product as $items)
                    <tr>
                        <td>
                            <img align="center" src="/upload/{{$items['product_img']}}" alt="logo" height="100px"
                                width="100px" />
                        </td>
                        <td>
                            <a href="/seller/detailProduct/{{$items['product_id']}}">
                                {{$items['product_id'] }}
                            </a>

                        </td>
                        <td>
                            {{$items['product_name']}}
                        </td>
                        <td>
                            {{$items['quantity']}}
                        </td>
                        <td>
                            {{$items['price']}}
                        </td>
                        <td>
                            {{$items['catagory_id']}}
                        </td>
                        <td>
                            {{$items['average_rating']}}
                        </td>
                        <td>
                            <span>
                                {{$items['description']}}
                            </span>

                        </td>
                        <td>
                            {{$items['published']}}
                        </td>
                        <td>
                            {{$items['exclusive']}}
                        </td>
                        <td>
                            <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#deleteProductID{{$items['product_id']}}">Edit
                            </a>
                        </td>
                        <td>
                            <div class="modal fade" id="deleteProductID{{$items['product_id']}}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" enctype="multipart/form-data" id="editForm">
                                                {{csrf_field()}}

                                                <table width="50%" align="center"
                                                    style="border-collapse: separate;border-spacing: 0 8px">
                                                    <tr>
                                                        <td width="45%">Product Name</td>
                                                        <td width="10%">:</td>
                                                        <td width="45%">
                                                            <input type="text" name="name" id="name"
                                                                value="{{$items['product_name']}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45%">Quntity</td>
                                                        <td width="10%">:</td>
                                                        <td width="45%">
                                                            <input type="number" name="quantity" id="quantity"
                                                                value="{{$items['quantity']}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45%">Product price</td>
                                                        <td width="10%">:</td>
                                                        <td width="45%">
                                                            <input type="number" name="price" id="price"
                                                                value="{{$items['price']}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="45%">Catagory</td>
                                                        <td width="10%">:</td>
                                                        <td width="45%">
                                                            <select name="catagory" id="catagory">
                                                                @foreach ($catagoryID as $item)
                                                                <option value="{{ $item->catagory_name}}">
                                                                    {{ $item->catagory_name}}
                                                                </option>
                                                                @endforeach
                                                            </select>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Description</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" name="description" id="description"
                                                                value="{{$items['description']}}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Exclusive</td>
                                                        <td>:</td>
                                                        <td>
                                                            <select name="exclusive" id="exclusive">
                                                                <option value="ttttt">Yes</option>
                                                                <option value="ffff">No</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Image</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="file" name="myImg"
                                                                value="/upload/{{$items['product_img']}}"
                                                                accept="image/*" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <input type="hidden" name="productID" id="productID"
                                                            value="{{$items['product_id']}}">
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No</button>
                                                                <button id="btn" type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @if(Session::has('status'))
                <div class="alert alert-success" role="alert" style="width:20%">
                    {{ Session::get('status') }}
                    <P id="result"></P>
                </div>
                @endif
            </div>
        </div>





        <!-- MODALLLLLLL-->

        <!-- Modal -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
            crossorigin="anonymous"></script>
        <script src=" /js/jquery.min.js "></script>
        <script src=" /js/popper.js "></script>
        <script src=" /js/bootstrap.min.js "></script>
        <script src=" /js/main.js "></script>

        <script>
        $('#editForm').submit(function(e) {
            e.preventDefault();
            //alert("ajax clicked");

            let product_id = $('#productID').val();
            alert(product_id);
            let name = $('#name').val();
            let quantity = $('#quantity').val();
            let price = $('#price').val();
            let catagory = $('#catagory').val();
            let description = $('#description').val();
            let exclusive = $('#exclusive').val();
            let __token = $("input[name=__token]").val();
            alert("ajax clicked done");
            $.ajax({
                type: "POST",
                url: "{{route('editPP')}}",
                datatype: json,
                data: {
                    product_id: product_id,
                    name: name,
                    quantity: quantity,
                    price: price,
                    catagory: catagory,
                    description: description,
                    exclusive: exclusive,
                    __token: __token
                },
                success: function(data) {
                    console.log(data);
                    alert(data);
                    if (response) {
                        $('#result').append("success");
                    }
                }

            });
        });
        </script>











        <!-- 

        jQuery(document).ready(function() {
        jQuery('#editForm').click(function(e) {
        e.preventDefault();
        alert("ajaxxx");
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });
        jQuery.ajax({
        url: "{{ url('productEdit') }}",
        method: 'post',
        data: {
        product_id: $($productID).val(),
        name: $($name).val(),
        quantity: $($quantity).val(),
        price: $($price).val(),
        catagory: $($catagory).val(),
        description: $($description).val(),
        exclusive: $($exclusive).val(),
        },
        success: function(result) {
        console.log(result);
        }
        });
        });
        }); -->



</body>

>>>>>>> efc5a772a204196565a72cbc72d4d7c30756d0c5:resources/views/seller/productListEdit.blade.php
</html>