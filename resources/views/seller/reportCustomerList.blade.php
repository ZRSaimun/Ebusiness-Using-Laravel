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
                    <h3>Pending Orders</h3>
                </span>
                <table class="table" border="1px" style="width:70%;height:80%">
                    <tr>
                        <th width="10%">Order Id</th>
                        <th width="10%">Product ID</th>
                        <th width="10%">Customer Id</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Status</th>
                        <th width="10%">Paid</th>
                        <th width="15%">Order Date</th>
                        <th width="10%">Seller Revenue</th>
                        <th width="10%">Status</th>
                    </tr>

                    @foreach ($orderList as $items)
                    <tr>
                        <td>
                            {{$items->order_id }}
                        </td>
                        <td>
                            {{$items->product_id }}
                        </td>
                        <td>
                            {{$items->customer_id }}
                        </td>
                        <td>
                            {{$items->quantity }}
                        </td>
                        <td>
                            {{$items->order_status }}
                        </td>
                        <td>
                            {{$items->paid }}
                        </td>
                        <td>
                            {{$items->date }}
                        </td>
                        <td>
                            {{$items->seller_revenue }}
                        </td>
                        <td>
                            <a href="reportCustomer/{{$items->customer_id }}" class="btn btn-success">Report
                            </a>
                        </td>



                    </tr>
                    @endforeach
                </table>
                @if(Session::has('status'))
                <div class="alert alert-success" role="alert" style="width:20%">
                    {{ Session::get('status') }}
                </div>
                @endif
            </div>
        </div>


        <!-- MODALLLLLLL-->

        <!-- Modal -->


        <script src="/js/jquery.min.js "></script>
        <script src="/js/popper.js "></script>
        <script src="/js/bootstrap.min.js "></script>
        <script src="/js/main.js "></script>
</body>

</html>