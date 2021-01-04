<!doctype html>
<html lang="en">

<head>
    <title>View Product Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>


<body>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <div align="center">
                <form method="POST" enctype="multipart/form-data">
                    <span align="center">
                        <h3>View Product Information</h3>
                    </span>
                    
                    <table width="50%" align="center" style="border-collapse: separate;border-spacing: 0 8px">
                        <tr>
                            <td>Product ID</td>
                            <td>:</td>
                            <td>{{ $data['product_id'] }}</td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                            <td>:</td>
                            <td>{{ $data['product_name'] }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td>{{ $data['price'] }}</td>
                        </tr>
                        <tr>
                            <td>Rating</td>
                            <td>:</td>
                            <td>{{ $data['average_rating'] }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>{{ $data['description'] }}</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="{{route('customer.wishlist')}}">Back</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <script src="/js/jquery.min.js "></script>
        <script src="/js/popper.js "></script>
        <script src="/js/bootstrap.min.js "></script>
        <script src="/js/main.js "></script>
</body>

</html>