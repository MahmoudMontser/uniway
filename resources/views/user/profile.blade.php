@extends('layout.start')
@section('content')

    <div class="col-lg-8 col-lg-offset-2 " >
        <!--////////////////////////////////////-->
        <!--class="jumbotron"-->
        <div class="user">
            <div class="row" style="color: #e2e6ea;font-family: inherit;font-size: 1.5rem;">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4"  style="text-align: center;">
                    <img src="{{asset('images/user_profile/'.$pic=\Illuminate\Support\Facades\Auth::user()->pic)}}" class="avatar rounded-circle img-thumbnail" alt="avatar" style="width: 225px;height: 215px;	border:5px solid #03b1ce">                                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" style="margin-top:30px;">
                    <div class="container" style="border-bottom:1px solid #e2e6ea ;margin-bottom: 20px">
                        <h2 class="user_name">{{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
                        <p style="display: inline-block ;" ></p>
                        <span id="user_rate" style="margin-left: 10px;">
                                         <span class="fa fa-star checked"></span>
                                         <span class="fa fa-star checked"></span>
                                         <span class="fa fa-star checked"></span>
                                         <span class="fa fa-star"></span>
                                         <span class="fa fa-star"></span>
                                        </span>


                    </div>

                    <ul class="container details">

                        <li><p><span class="fa fa-envelope" aria-hidden="true"></span>{{\Illuminate\Support\Facades\Auth::user()->email}}</p></li>
                        <li ><p><a href="{{route('edit_profile')}}"><i class="fa fa-pencil-square-o" ></i>Edit profile</a></p></li>
                        <li><p><button class="btn btn-dark" ><i class="fa fa-sign-out"></i>Logout</button></p></li>
                    </ul>
                </div>
            </div>



        </div>
    </div>
@endsection