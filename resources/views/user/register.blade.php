<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Sign Up </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('S_assets/Sign Up/css/Sign Up.css')}}">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="https://raw.githubusercontent.com/l-lin/font-awesome-animation/master/dist/font-awesome-animation.min.css">
    -->
</head>
<body>
<!-- start of page-->


            <div class="container">
                <img src="{{asset('M_assets/img/logo_with text 2_ high res.png')}}" class="logo" alt="logo" style="margin-top: -5em">
                <form class="form-group" action="{{route('register')}}" method="post" enctype="application/x-www-form-urlencoded">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$email ?? ''}}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUserName1">User Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputUserName1" value="{{$name ?? ''}}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Age</label>
                        <select name="age" class="form-control" id="exampleFormControlSelect1">

                            <option value="18"> 18</option>
                            <option value="19">19 </option>
                            <option value="20"> 20</option>
                            <option value="21"> 21</option>
                            <option value="22">22 </option>
                            <option value="23"> 23</option>
                            <option value="24"> 24</option>
                            <option value="25">25 </option>
                            <option value="26">26 </option>
                            <option value="27"> 27</option>
                            <option value="28"> 28</option>
                            <option value="29"> 29</option>
                            <option value="30"> 30</option>
                            <option value="31"> 31</option>
                            <option value="32"> 32</option>
                            <option value="33"> 33</option>
                            <option value="34"> 34</option>
                            <option value="35"> 35</option>
                            <option value="36"> 36</option>
                            <option value="37"> 37</option>
                            <option value="38"> 38</option>
                            <option value="39"> 39</option>
                            <option value="40"> 40</option>



                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone1">Phone</label>
                        <input name="phone" type="phone" class="form-control" id="exampleInputPhone1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputIDnumber1">National ID</label>
                        <input name="national_id" type="text" class="form-control" id="exampleInputIDnumber1">
                    </div>
                    <div class="col-sm-9 col-xs-9 col-md-9 col-lg-9 ">

                        <a href="#"><button type="submit" class="btn btn-danger" value="submit"><b>Sign Up</b></button></a>

                    </div>

                </form>
            </div>
<!--version 1.9.1 of jquery at least with 4.0.0 bootstrap-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('S_assets/Sign Up/js/Sign Up.js')}}"></script>

</body>

</html>


















