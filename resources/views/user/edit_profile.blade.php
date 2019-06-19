@extends('layout.start')
@section('content')
        <div class="col-lg-8 col-lg-offset-2 ">
            <!--<h1>content :</h1>-->

            <div class="container my-lg-5" style="color: #e2e6ea ;margin-top: -30px;">

                <div class="row">
                    <div class="col-sm-4"><!--left col-->
                        <form class="form" action="{{route('update')}}" method="post" id="registrationForm" enctype="multipart/form-data">
{{csrf_field()}}
                        <div class="text-center">
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-thumbnail" alt="avatar" style="width: 180px;height: 180px;	border: 5px solid #03b1ce">
                            <!--rgba(255, 255, 255,.2);-->
                            <h6>Upload a different photo...</h6>
                            <div class="image-upload">
                                <label for="file-input">
                                    <span class="fa fa-upload fa-3x"></span>
                                </label>
                            <input type="file" class="file-upload" id="file-input" name="pic" value="{{asset('images/user_profile/'.isset($user->pic))}}">
                        </div>
                    </div><!--/col-3-->
                    <div class="col-sm-8">



                            <div class="form-group">

                                <div class="col-xs-10">
                                    <label for="first_name"><h4>Name</h4></label>

                                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" title="enter your first name if any.">
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: -10px;">

                                <div class="col-xs-10">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" title="enter your email.">
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: -10px;">

                                <div class="col-xs-10">
                                    <label for="phone"><h4>Phone</h4></label>
                                    <input type="tel" class="form-control" name="phone" id="phone" value="{{$user->phone}}" title="enter your phone.">
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: -10px;">

                                <div class="col-xs-10">
                                    <label for="password"><h4>Password</h4></label>
                                    <input type="password" class="form-control" name="password" id="password"  title="enter your password.">
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: -10px;">

                                <div class="col-xs-10">
                                    <label for="password"><h4>Confirm Password</h4></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="Confirm password" title="enter your password.">
                                </div>
                            </div>

                            <div class="form-group " style="margin-top: -20px">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit" value="submit"><i class="fa fa-check-circle"></i> Save</button>
                                </div>
                            </div>
                        </form>






                    </div><!--/tab-pane-->
                </div><!--/tab-content-->

            </div><!--/col-9-->
        </div><!--/row-->

@endsection