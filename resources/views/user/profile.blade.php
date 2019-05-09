
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account info</title>
    <link rel="stylesheet" href="{{asset('M_assets/bootstrap\bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('M_assets/css/login.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('M_assets/dist/css/bootstrap-formhelpers.min.css')}}">
</head>

<body>
<div class="container">

    <div class="container user text-center rounded col-md-4">

        <img src="{{asset('M_assets/img/user3.png')}}" class="mx-auto" style="width:70%; margin-top: 20px" alt="">
        <a href="#"> <img src="{{asset('M_assets/img/upload.png')}}" class="" style="width:50px; margin-left: 60px" alt=""></a>
        <a href="#"> <img src="{{asset('M_assets/img/takephoto.png')}}" class="float-left" style="width:50px" alt=""> </a>
        <br/>
    </div>
    <div class="container text-center">
        <h3 style="color: aliceblue">User Name</h3>
    </div>
    <div class="container col-md-7">
        <!-- home location -->
        <div class="form-group row hloc inner-addon right-addon" >
            <label class="col-sm-3 col-form-label">Home location</label>
            <div class="col-sm-9">

                <form>
                    <div class="input-group" >
                        <input type="search" class="form-control"  placeholder="Set your home location">
                        <span class="input-group-btn ">

    			<button type="submit" class="search-btn btn btn-dark">
					<i class="fa fa-location-arrow" style="color: aliceblue"></i>
      		</button>
     			 </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- regular location -->
        <div class="form-group row rloc">
            <label class="col-sm-3 col-form-label">Regular location</label>
            <div class="col-sm-9 inner-addon right-addon">
                <form>
                    <div class="input-group" >
                        <input type="search" class="form-control"  placeholder="Set your regular location">
                        <span class="input-group-btn ">

    			<button type="submit" class="search-btn btn btn-dark">
					<i class="fa fa-location-arrow" style="color: aliceblue"></i>
      		</button>
     			 </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- phone -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Phone :</label>
            <div class="col-sm-7">

                <form>
                    <div class="input-group" >
                        <input type="tel" class="form-control"  placeholder="Set your phone number">
                        <span class="input-group-btn ">

    			<button type="submit" class="search-btn btn btn-dark">
					<i class="fa fa-phone" style="color: aliceblue"></i>
      		</button>
     			 </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- payment -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Add Payment Method</label>
            <div class="col-sm-9">
                <form>
                    <div class="input-group" >
                        <input type="search" class="form-control"  placeholder="valid card number">
                        <span class="input-group-btn ">

    			<button type="submit" class="search-btn btn btn-dark">
					<i class="fa fa-credit-card-alt" style="color: aliceblue"></i>
      		</button>
     			 </span>
                    </div>
                    <br>
                    <div class=" row">
                        <div class="input-group col-sm-3">
                            <input type="text" class="form-control" placeholder="zip code">
                        </div>
                        <div class="input-group col-sm-3" >
                            <input type="text" class="form-control" placeholder="CVV">
                        </div>
                        <div class="input-group col-sm-3" >
                            <input type="text" class="form-control" placeholder="EXP Date">
                        </div>
                    </div><br>
                    <div class="form-group" style="padding-bottom: 100px">
                        <button type="submit" id="verify" class="btn btn-success btn-lg btn-block">Save  <span class="fa fa-"></span></button>
                        <br/>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="footer fixed-bottom">
        <img src="{{asset('M_assets/img/logo_with text 2_ high res.png')}}" class="logo" alt="logo">
        <p class="copyright text-muted">Copyright &copy; <a href="#">UniWayCarpool.com</a> 2019 UniWay &copy;</p>
    </div>
</div>







<script src="{{asset('M_assets/bootstrap\bootstrap.min.css')}}"></script>
<script src="{{asset('M_assets/js\jquery-3.3.1.min.js')}}"></script>

<script src="{{asset('M_assets/bootstrap\bootstrap-formhelpers.min.js')}}"></script>

</body>
</html>
