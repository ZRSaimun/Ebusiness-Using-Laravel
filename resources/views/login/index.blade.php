<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:2px solid #ccc; 
            height: 300px;
            position: relative;
            background-color: #FFFFFF;
        }

        body{ 
            background-color: #ADD8E6;
        }

        .center {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        } 
    </style>
</head>

<body>
	<h5 align="center" style="color: red">
            @if (session('msg'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('msg') }}</strong>
            </div>
            @endif
    </h5>

    <div class="center">
        <div class="container box">
            <h3 align="center">Login</h3><br />

            @if(isset(Auth::user()->email))
                <script>window.location="/main/successlogin";</script>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif

                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" />
                    </div>
                    <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Login" />
                    </div>
                </form>
          </div>
        </div>
        
</body>
</html>