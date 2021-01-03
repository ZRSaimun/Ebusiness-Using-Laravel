<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Ebazar</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/adminStatic/adminProfile/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/adminStatic/adminProfile/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/adminStatic/adminProfile/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/adminStatic/adminProfile/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/adminStatic/adminProfile/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    


 <!-- Start My Account  -->
<div class="my-account-box-main">
    <div class="container">
    <img class='centerIMG' src="{{asset('upload/'.$admin[0]['profile_pic'])}}" width="80px" height="80px">
    <h1> Profile </h1>
        <div class="my-account-page">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="{{route('AdminPresonalInfo')}}"> <i class="fa fa-lock"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4>Personal Information</h4>
                                <p>See your Information</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="{{route('AdminProfilePic')}}"> <i class="fa fa-user"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4>Profile Picture</h4>
                                <p>see and update profile picture</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
<!-- End My Account -->

 


    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="/adminStatic/adminProfile/js/jquery-3.2.1.min.js"></script>
    <script src="/adminStatic/adminProfile/js/popper.min.js"></script>
    <script src="/adminStatic/adminProfile/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/adminStatic/adminProfile/js/jquery.superslides.min.js"></script>
    <script src="/adminStatic/adminProfile/js/bootstrap-select.js"></script>
    <script src="/adminStatic/adminProfile/js/inewsticker.js"></script>
    <script src="/adminStatic/adminProfile/js/bootsnav.js."></script>
    <script src="/adminStatic/adminProfile/js/images-loded.min.js"></script>
    <script src="/adminStatic/adminProfile/js/isotope.min.js"></script>
    <script src="/adminStatic/adminProfile/js/owl.carousel.min.js"></script>
    <script src="/adminStatic/adminProfile/js/baguetteBox.min.js"></script>
    <script src="/adminStatic/adminProfile/js/form-validator.min.js"></script>
    <script src="/adminStatic/adminProfile/js/contact-form-script.js"></script>
    <script src="/adminStatic/adminProfile/js/custom.js"></script>
</body>

</html>