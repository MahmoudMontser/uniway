<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>sidenav</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets_elham/css/sideNav.css')}}">
    <link rel="stylesheet" href="{{asset('assets_elham/css/mytrip.css')}}">
    <link rel="stylesheet" href="{{asset('assets_elham/css/user_profile.css')}}">
    <link rel="stylesheet" href="{{asset('assets_elham/css/edit_profile.css')}}">


    <link rel="stylesheet" href="{{asset('assets_elham/css/animate.min.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="https://raw.githubusercontent.com/l-lin/font-awesome-animation/master/dist/font-awesome-animation.min.css">
    -->
</head>
<body>
<!-- start of page-->

<div class="container-fluid">
    <!--#wrapper-->
    <div id="wrapper">
        <!--.overlay class-->
        <div class="overlay"></div>
        <!--/.overlay class-->

        <!-- Sidebar -->
        <!-- .navbar fixed-top-->
        <nav class="navbar fixed-top" id="sidebar-wrapper" role="navigation">
            <!-- ul-->
            <ul class="nav sidebar-nav">

                <!--sideNav brand&&logo-->
                <!--.sidebar-brand-->
                <div class="sidebar-header">
                    <div class="sidebar-brand">

                        <a href="#"><img src="{{asset('images/user_profile/'.$pic=\Illuminate\Support\Facades\Auth::user()->pic)}} " alt="user"></a>
                    </div>
                </div>
                <!--/.sidebar-brand-->
                <!--sideNav upper Link-->
                <li><a href="{{route('home_page')}}">HOME</a></li>

                <li><a href="{{route('profile')}}"><span class="fa fa-user">PROFILE</a></li>
                <!--/sideNav upper Link-->
            </ul>

            <!-- ul-->
            <!--///////////////////sideNav Footer-->
            <!--.card-footer-->
            <div class="card-footer">

                Uniway is your solution for daily comfortable ride sharing trips          <!--sideNav social-->
                <div class="social">
                    <a href="#facebook"></a>
                    <a href="#twitter"></a>
                    <a href="#linkedin"></a>
                    <a href="#google-plus"></a>

                </div>
                <!--/sideNav social-->
            </div>
            <!--/.card-footer-->

        </nav>
        <!-- /#sidebar-wrapper -->


        <!--close && open button of nav -->
        <!--#page-content-wrapper -->

        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <!--/#page-content-wrapper -->
            <!--/close && open button of nav -->
            <!-- Page Content -->
            <div class="container">
                <div class="row justify-content-center">
                    {{--<div class="col-lg-8 col-lg-offset-2 " >--}}
                        {{--<h1>content :</h1>--}}



                    {{--</div>--}}
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

</div>
<!-- /.container-fluid -->



<script src="{{asset('assets_elham/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>

<!--version 1.9.1 of jquery at least with 4.0.0 bootstrap-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('assets_elham/js/sidenav.js')}}"></script>
<script src="{{asset('assets_elham/js/edit_profile.js')}}"></script>
<script src="{{asset('js\sweetalert.min.js')}}"></script>
<script>
    @if(notify()->ready())

    swal({
        title:"{{notify()->message()}}",
        icon:"{{notify()->type()}}",
    });

    @endif
</script>
</body>
</html>