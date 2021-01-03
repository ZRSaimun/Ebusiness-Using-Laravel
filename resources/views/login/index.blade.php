<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

    <form method="post">
        {{csrf_field()}}
        <fieldset>
            <legend>Login Form</legend>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="email">
                        @error('email')
                        <span class="text-danger">{{$message}} </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password">
                        @error('password')
                        <span class="text-danger">{{$message}} </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>