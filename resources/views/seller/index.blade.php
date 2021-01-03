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
    <script>
    $(document).ready(function() {
        $("button").click(function() {
            $("p").hide();
        });
    });
    </script>


</head>


<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                <ul class="list-unstyled components mb-5">
                    <!-- <li class="active">
                        <a href="/seller">Profile</a>
                    </li> -->
                    <li class="active">
                        <a href="#mainSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Profile</a>
                        <ul class="collapse list-unstyled" id="mainSubmenu">
                            <li>
                                <a href="/seller/addProduct">Edit profile</a>
                            </li>
                            <li>
                                <a href="/seller/deleteProduct">Delete Profile</a>
                            </li>
                            <li>
                                <a href="/seller/editProduct">Change Password</a>
                            </li>

                        </ul>
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
                        </script> All rights reserved <i class="icon-heart" aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Auml@n</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <form method="post">
                <div align="center " width="100% " style="margin-left: 23%;">

                    <table align="center " width="60% ; margin-left=23%">
                        <tr style="height: 50px;background-color: #ccc7c7;">
                            <td width="30% " colspan="5 ">
                                <img align="right " src="{{asset('/upload/personal.jpg')}}" alt="person "
                                    height="200px " width="200px " />
                            </td>
                        </tr><br><br>
                        <tr style="height: 50px;background-color: #f5f5f5;">
                            <td width="30% ">User ID</td>
                            <td width="10% ">:</td>
                            <td width="30% ">
                                {{ $user_id }}
                            </td>

                        </tr>
                        <tr style="height: 50px;background-color: #f5f5f5;">
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                {{ $name}}
                            </td>
                        </tr>
                        <tr style="height: 50px;background-color: #f5f5f5;">
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                {{ $email}}
                            </td>
                        </tr>
                        <tr style="height: 50px;background-color: #f5f5f5;">
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                {{$address}}
                            </td>
                        </tr>
                    </table>
                </div>
            </form>

        </div>


        <script src="/js/jquery.min.js "></script>
        <script src="/js/popper.js "></script>
        <script src="/js/bootstrap.min.js "></script>
        <script src="/js/main.js "></script>






</body>

</html>