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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.js">
    </script>



    <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="src/jquery.table2excel.js"></script>



    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

    <script src="bower_components\jquery\dist\jquery.min.js"></script>
    <script src="bower_components\jquery-table2excel\dist\jquery.table2excel.min.js"></script>




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
                        </script> All rights reserved | This template is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <div align="center" id="tablewrap">
                <span align="center">
                    <h3>Total Income from The Product</h3>
                </span>
                <table border="1px" width="80%" class="table">
                    <tr>
                        <th width="20%">Order ID</th>
                        <th width="20%">Customer ID</th>
                        <th width="20%">Quantity</th>
                        <th width="30%">date</th>
                        <th width="10%">Revenue</th>

                    </tr>
                    @php($total=0)
                    @foreach ($orderList as $items)
                    <input type="hidden" {{$total=$total+$items->seller_revenue }}>

                    <tr>
                        <td>
                            {{$items->order_id }}

                        </td>
                        <td>
                            {{$items->customer_id }}

                        </td>
                        <td>
                            {{$items->quantity }}


                        </td>
                        <td>
                            {{$items->date }}


                        </td>
                        <td>
                            {{$items->seller_revenue }}



                        </td>



                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">
                            <h3>Total Revenue from The Product: {{$total}}
                                BDT
                            </h3>

                        </td>

                    </tr>


                </table>
                <div class="form-group col-sm-offset-10 col-sm-20">
                    <button onclick="window.print();" class="btn btn-primary">Print Report</button>
                </div>
            </div>
        </div>


        <script src="/js/jquery.min.js "></script>
        <script type="text/javascript" src="jquery.table2excel.js "></script>
        <script src="/js/popper.js "></script>
        <script src="/js/bootstrap.min.js "></script>
        <script src="/js/main.js "></script>

</body>



</html>