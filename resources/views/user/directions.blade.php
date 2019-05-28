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
        /*day selector */
        .day {
            display: inline-block;}
        .weeks {
            margin: 0 auto;
        }
        .weeks input {
            width: 100%;
            height: 100%;
            opacity: 0;
        }
        .weeks label {
            color: rgb(102, 102, 102);
            width: 100%;
            height: 100%;
            background: #f2f2f2;
            padding: 10px;
            font-size: 11px;
            border-radius: 2px
        }
        .weeks input:checked + label {
            background: #1a75d2;
            font-weight: 600;
            color: #fff;
            font-size: 11px;
            padding: 10px;
        }
        /*rating stars */
        .checked {
            color: orange;
        }

    </style>
</head>
<body>
<!-- location div -->
<div class="container">
    <input id="origin-input" class="controls" type="text"
           placeholder="Enter an origin location">

    <input id="destination-input" class="controls" type="text"
           placeholder="Enter a destination location">

</div>
<div id="map"></div>


<!-- Time and date picker -->
<div id="settings" class="" style="overflow:scroll;">
    <div class="row container" >
        <!-- Start time -->
        <div class="col s6 m3">
            <h5>Go</h5>
            <form method="post">
                <div class="input-field">
                    <input type="text" id="time" style="border:none; font-size:24px;" class="col-sm-3 timepicker">
                    <label for="time">Set Time </label>
                </div>
            </form>
        </div>
        <!-- back time -->
        <div class="col s6 m3">
            <h5>Back</h5>
            <form method="post">
                <div class="input-field">
                    <input type="text" id="time_1" style="border:none; font-size:24px;" class="col-sm-3 timepicker">
                    <label for="time_1">Set Time </label>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var elems = document.querySelectorAll('.timepicker');
                            var instances = M.Timepicker.init(elems, options);
                        });

                    </script>

                </div>
            </form>
        </div>
        <!-- check your mode -->
        <div class="col-sm-6 s6 m3" style=overflow:auto;"">
            <div class="switch">
                <label style="font-size:18px; margin-left: 10px">
                    rider
                    <input type="checkbox" name="selectwho" id="myMode" onclick="myFunction()">
                    <span class="lever"></span>
                    driver
                </label>
                <script type="text/javascript">
                    function myFunction(){
                        var mode = document.getElementById("myMode");
                        var day = document.getElementById("myDiv");
                        if (mode.checked == true){
                            day.style.display = "block";
                        } else {

                            day.style.display = "none";
                        }
                    }
                </script>

            </div>
            <div class="col s6 row" style="display:none;" id="myDiv">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <div class="inline" >
                    Seats :
                    <input id="seats" type="text" class="col-sm-2">
                </div>
            </div>


        </div>

        <!-- Days selector -->
        <div class="row container-fluid">
            <div class="col-sm-6 s6 ">
                <group class="weeks">
                    <h5>Day</h5>
                    <div class="day">
                        <input id="monday" type="checkbox">
                        <label for="monday">Mo</label>
                    </div>
                    <div class="day">
                        <input id="tuesday" type="checkbox">
                        <label for="tuesday">Tu</label>
                    </div>
                    <div class="day">
                        <input id="wednesday" type="checkbox">
                        <label for="wednesday">We</label>
                    </div>
                    <div class="day">
                        <input id="thursday" type="checkbox">
                        <label for="thursday">Th</label>
                    </div>
                    <div class="day">
                        <input id="friday" type="checkbox">
                        <label for="friday">Fr</label>
                    </div>
                    <div class="day">
                        <input id="saturday" type="checkbox">
                        <label for="saturday">Sa</label>
                    </div>
                    <div class="day">
                        <input id="sunday" type="checkbox">
                        <label for="sunday">Su</label>
                    </div>
                </group>

            </div>
            <div class="form-inline col-sm-6 s6 m3">
                <button class="submit-btn col-lg-3" id="ajaxSubmit" onclick="myFunction()" > Next </button>
            </div>
        </div>
        <!-- end Days selector -->
    </div>
</div>

<!-- map api -->
<script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: false,
            center: {lat: 31.0662663, lng: 31.3784252},
            zoom: 12,
        });

        new AutocompleteDirectionsHandler(map);
    }

    /**
     * @constructor
     */
    function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');

        var originAutocomplete = new google.maps.places.Autocomplete(originInput);
        // Specify just the place data fields that you need.
        originAutocomplete.setFields(['place_id']);

        var destinationAutocomplete =
            new google.maps.places.Autocomplete(destinationInput);
        // Specify just the place data fields that you need.
        destinationAutocomplete.setFields(['place_id']);



        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
            destinationInput);

    }



    AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(
        autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();

            if (!place.place_id) {
                window.alert('Please select an option from the dropdown list.');
                return;
            }
            if (mode === 'ORIG') {
                me.originPlaceId = place.place_id;
            } else {
                me.destinationPlaceId = place.place_id;
            }
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
        }
        var me = this;

        this.directionsService.route(
            {
                origin: {'placeId': this.originPlaceId},
                destination: {'placeId': this.destinationPlaceId},
                travelMode: 'DRIVING'
            },
            function(response, status) {
                if (status === 'OK') {
                    me.directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
    };



</script>
<!-- end map -->

<!-- back time script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var timer = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(timer, {});
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC20yjMYP8acq7pllKQnnRdZ6CwCiQxVGw&libraries=places&callback=initMap" async defer></script>
<!--  js for clock -->
<script>
    const timer = document.querySelector('.timepicker');
    M.Timepicker.init(timer,{

    });
</script>

<!--  Ajax setup and request -->


<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        });
    });
</script>

<script>
    jQuery(document).ready(function(){
        jQuery('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('match_or_create') }}",
                method: 'post',
                data: {
                    go: jQuery('#time').val(),
                    back: jQuery('#time_1').val(),
                    DR: jQuery('#mode').val(),
                    seats: jQuery('#seats').val(),
                    days: jQuery('Days').val()
                },
                success: function(result){
                    console.log(result);
                }});
        });
    });
</script>
<!-- end Ajax setup and request -->

</body>
</html>
