<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uni Way</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets_elham/css/splash.css')}}">
    <link rel="stylesheet" href="{{asset('assets_elham/css/animate.min.css')}}">




</head>
<body>
<!-- start of page-->
<a href="{{route('login_page')}}" id="splashPage">
    <div class="container-fluid">
        <!--logo img row-->
        <div class="row">
            <div class="logo"> <img class="col-sm-5 mx-auto d-block wow bounceInDown  " src="{{asset('assets_elham/img/1.png')}}" alt=""></div>
        </div>
        <!--/logo img row-->
        <!--start welcome row-->
        <!--.row-->
        <div class="row ">
            <!--.col-sm welcome text-center-->
            <div class="col-sm welcome text-center">
                <h3 class="wow heartBeat " style="color:#ececf6;">welcome</h3>
                <!--/.col-sm welcome text-center-->
                <!--paragraph after welcome-->

                <p style="color: #c0ddf6">Uniway is your solution for daily comfortable ride sharing trips</p>

            </div>
        </div>
        <!--end welcome row-->
    </div>
    <!--end body content-->



    <script src="{{asset('assets_elham/js/wow.min.js')}}"></script>

    <script>
        new WOW().init();
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{asset('assets_elham/js/splash.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</a>
</body>
</html>