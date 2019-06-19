
<!DOCTYPE html>
<html>
<head>
    <title>Route setting</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- style of page  -->
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 79%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
        }
        #settings {
            height: 35%;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 999;
            color: #fff;
            background:linear-gradient(to right,#206075 ,#192D5B);

            padding: 5px 11px 0px 11px;
            -moz-box-shadow:    3px 3px 5px 6px #ccc;
            -webkit-box-shadow: 3px 3px 5px 6px #ccc;
            box-shadow:         3px 3px 5px 6px #ccc;
            width: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #origin-input,
        #destination-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 200px;
        }

        #origin-input:focus,
        #destination-input:focus {
            border-color: #4d90fe;
        }

    </style>
</head>
<body>

<div id="map"></div>


<!-- Time and date picker -->
<div id="settings" class="" style="overflow:scroll;">
    <div class="row container" >
        <!-- Start time -->



        <!-- Days selector -->
        <div class="row container-fluid">


        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
    var re;

  $.ajax({
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'http://127.0.0.1:8000/get_trip/1',
                success: function (response) {

                    re= response;

                }
                ,
                error: function () {
                    console.log(data);
                }
            });




    function initMap(){

        var option ={
            zoom:11,
            center:{lat:31.068940,lng:31.085850 },
        }


        var map= new google.maps.Map(document.getElementById('map'),option);


        subscription({coords:{lat:30.966835 ,lng:31.199766 },content:'casca'},{coords:{lat:31.040949 ,lng:31.378469 },content:'casca'});
        function subscription(orgin,destination){

            addMarker2(orgin);
            addMarker(destination);
        }

        function addMarker(props) {
            var marker= new google.maps.Marker({
                position:props.coords,
                map:map,
                info:'hay',
                icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                animation: google.maps.Animation.DROP,


            });
            var infoWindow=new google.maps.InfoWindow({
                content:props.content
            });
            marker.addListener('mouseover',function () {
                infoWindow.open(map,marker);

            });

        }
        function addMarker2(props) {
            var marker= new google.maps.Marker({
                position:props.coords,
                map:map,
                info:'hay',


            });
            var infoWindow=new google.maps.InfoWindow({
                content:props.content
            });
            marker.addListener('mouseover',function () {
                infoWindow.open(map,marker);

            });

        }

        infoWin=new google.maps.Infowindow({
            content:'content',

        });
        marker.addListener('mouseover',function () {
            infoWin.open(map,marker);

        });

    }




</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzYd_QbCveMHHuBnjieD7TYBF0oqh9Iek&callback=initMap">
</script>


</body>
</html>
