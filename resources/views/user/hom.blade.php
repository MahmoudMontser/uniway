@extends('layout.start')
@section('content')
            <div class="container page">
                <div class="row justify-content-center">
                    <div class="container" style="align-content: center; ">
                        <div class="flex-row" style="text-align: center">
                           <a href="{{route('new_trip')}}"> <button class="btn btn-success btn-lg " style=" width: fit-content;margin-top: 50px" onclick="">+  create trip</button></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-lg-offset-2 scrollbar style_scroll" id="b" >


                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
</div>
<!-- /.container-fluid -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $.ajax({
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '{{route('home_data')}}',
        success: function (response) {
            if (response.value == true) {

                var x = response.data;
                var n = [];
                for (var i = 0; i < x.length; i++) {
                    var trip_id = x[i].trip_id;
                    var bs = x[i].subscribers_id;
                    $.each(bs, function (index, value) {
                        var rating = value.rating;
                        var name = value.name;
                        if (value.status == 'master') {
                            var innerdiv = $("<div class='innerdiv container col-sm-10 col-lg-8  force-overflow' id='style_scroll'></div>");

                            var driver_img = $("<div style='display: inline-block;width: 50px;float: left;'><img class='supscriber_img' id='driver_img' src='assets/img/4.jpg' > " +
                                "<br>" +
                                "<h6 class='supscriber_name' style='font-size: 15px'>"+name+" </h6>" +
                                "</div>");
                            (innerdiv).append(driver_img);
                            for (var j = 0; j < rating; j++) {
                                (innerdiv).append("<span class='fa fa-star  checked_rate'></span>")
                            }
                            for (k = 0; k < (5 - rating); k++) {
                                (innerdiv).append("<span class='fa fa-star-o '></span>")
                            }

                            var subscribers = $("<div class='row supscriber_div'>" +
                                "<div class='col-lg-6 col-sm-6' style='margin: auto;'>" +
                                "<img src='assets/img/4.jpg' class='supscriber_img'>" +
                                "<img src='assets/img/6.jpg' class='supscriber_img'>" +
                                "<img src='assets/img/3.jpg' class='supscriber_img'>" +
                                "</div></div>");

                            $("#b").append(innerdiv);

                            (innerdiv).append(subscribers);
                        }
                    });
                }


            }else $('#b').append('<h3 style="margin-left:100px;margin-top: 250px">'+response.msg+'</h3>');
        }
        ,
            error: function () {
                console.log(data);
            }
    });

</script>
@endsection