
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('M_assets/bootstrap\bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('M_assets/css/login.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>vLogIn</title>
    <style media="screen">
    </style>
</head>
<body>
<div class="container-fluid">

</div>
<div class="container login col-lg-5" style="margin-top: 50px">
    <h1 style="text-align:center; color:aliceblue;" >Login</h1>
    <br/>
    <form method="post" action="{{route('login')}}" enctype="application/x-www-form-urlencoded">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="phone" placeholder="Enter Your Phone" type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>

            <input name="password" placeholder="Enter The Password" type="password" class="form-control form-control-sm" id="exampleInputPassword1">
            <a href="#" style="float:right;font-size:16px;color: aqua">Forgot password?</a>
        </div>

        <button value="submit" type="submit" id="login" class="btn btn-danger btn-block">log in  <span class="fa fa-sign-in"></span></button>
        <br/>
    </form>


    <a href="{{route('google_login')}}"><img src="{{asset('M_assets/img/Gmail.png')}}" alt="login with google" id="google"></a>
    <a href="{{route('facebook_login')}}"><img src="{{asset('M_assets/img/facebook.png')}}" alt="login with google"  id="facebook"></a>
</div>
<div class="signup container align-items-center">
    <a href="#" style="color: aqua;"><h4 style="text-align: center;">Sign Up</h4></a>
</div>
<!-- footer -->
<div class="footer fixed-bottom">
    <img src="{{asset('M_assets/img/logo_with text 2_ high res.png')}}" class="logo" alt="logo">
    <p class="copyright text-muted">Copyright &copy; <a href="#">UniWayCarpool.com</a> 2019 UniWay &copy;</p>
</div>
</div>

<script src="{{asset('M_assets/bootstrap\bootstrap.min.css')}}"></script>
<script src="{{asset('M_assets/js\jquery-3.3.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>
</html>
