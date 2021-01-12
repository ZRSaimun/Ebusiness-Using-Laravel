<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Personal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="/adminStatic/adminProfile/css/profileForm.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<style>
	.centerIMG {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
<body>
	<!-- main bbbb -->
	<div class="main-w3layouts wrapper">
		<h1>Profile Picture</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post" enctype="multipart/form-data">
					@csrf
					<img class='centerIMG' src="{{asset('upload/'.$admin[0]['profile_pic'])}}" width="200px" height="200px">
					<input class='centerIMG' type="file" name="myPic" placeholder="profilePicture" required="">
					<input type="submit" value="UPDATE">
				</form>
				
			</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>