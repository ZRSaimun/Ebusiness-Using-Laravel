<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Login and security</title>
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
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Personal Information</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post">
                    @csrf
					<input class="text" type="text" name="name" placeholder="name" required="" value="{{$admin[0]['name']}}">
                    <input class="text" type="text" name="email" placeholder="email" required="" value="{{$admin[0]['email']}}">
					<input class="text" type="password" name="password" id="myInput" placeholder="Password" required="" value="{{$admin[0]['password']}}">
					<input type="checkbox" onclick="myFunction()" value="Show Password">
                    <input class="text" type="text" name="phone_no" placeholder="phone_no" required="" value="{{$admin[0]['phone_no']}}">
		
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

	<script>
			function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
			}
</script>
</body>
</html>