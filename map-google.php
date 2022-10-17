<?php require_once('header.php');?>
<div class="pcoded-content">
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">PSSP - Carteira de Pagamento</h5>
                    <p class="m-b-0">Bem vindo a sua Carteira de pagamento</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php">Página Incial</a>
                    <li class="breadcrumb-item">Carteira
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-6">
                                                <!-- Basic map start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Basic</h5>
                                                        <span>Map shows places around the world</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="basic-map" class="set-map"></div>
                                                    </div>
                                                </div>
                                                <!-- Basic map end -->
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                                <!-- Markers map start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Markers</h5>
                                                        <span>Maps shows <code>location</code> of the place</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="markers-map" class="set-map"></div>
                                                    </div>
                                                </div>
                                                <!-- Markers map end -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-6">
                                                <!-- Overlay map start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Overlay</h5>
                                                        <span>Map shows places around the world</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="mapOverlay" class="set-map"></div>
                                                    </div>
                                                </div>
                                                <!-- Overlay map start -->
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                                <!-- Geo-Coding map start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Geo-Coding</h5>
                                                        <span>Search your location</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <form method="post" id="geocoding_form">
                                                            <div class="input-group input-group-button">
                                                                <input type="text" id="address" class="form-control" placeholder="Write your place">
                                                                <span class="input-group-addon" id="basic-addon1">
                                                                   <button class="btn btn-primary">Search Location</button>
                                                               </span>
                                                           </div>
                                                       </form>
                                                       <div id="mapGeo" class="set-map"></div>
                                                   </div>
                                               </div>
                                               <!-- Geo-Coding map end -->
                                           </div>
                                       </div>
                                       <div class="row">
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- Street View map start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Street View</h5>
                                                    <span>Map shows view of street</span>
                                                </div>
                                                <div class="card-block">
                                                    <div id="mapStreet" class="set-map"></div>
                                                </div>
                                            </div>
                                            <!-- Street View map end -->
                                        </div>
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- Map Types card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Map Types</h5>
                                                    <span>Select your <code>map-types</code> to see differant views</span>
                                                </div>
                                                <div class="card-block">
                                                    <div id="mapTypes" class="set-map"></div>
                                                </div>
                                            </div>
                                            <!-- Map Types card end -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- GeoRSS Layers map start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>GeoRSS Layers</h5>
                                                    <span>Shows <code>RSS</code> location</span>
                                                </div>
                                                <div class="card-block">
                                                    <div id="georssmap" class="set-map"></div>
                                                </div>
                                            </div>
                                            <!-- GeoRSS Layers map end -->
                                        </div>
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- Marker Clustering map start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Marker Clustering</h5>
                                                    <span>Multiple markers show differant location</span>
                                                </div>
                                                <div class="card-block">
                                                    <div id="map" class="set-map"></div>
                                                </div>
                                            </div>
                                            <!-- Marker Clustering map end -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Page body end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main-body end -->

                <div id="styleSelector">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<!-- Warning Section Starts -->
<!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- Google map js -->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="assets/pages/google-maps/gmaps.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/google-maps/google-maps.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/vertical/vertical-layout.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>

<script type="text/javascript">

    function _(element){

       return document.getElementById(element);
   }

   var logout = _("logout");
   logout.addEventListener("click", logout_user);



   function get_data(find,type){

    var xml = new XMLHttpRequest();

    xml.onload = function(){

        if (xml.readyState == 4 || xml.status == 200) {

            handle_result(xml.responseText, type);
        }
    }

        var data = {}; //objecto vazio
        data.find= find;
        data.data_type = type;
        data = JSON.stringify(data);

        xml.open("POST","API.php",true);
        xml.send(data);

    }

    function handle_result(result,type){

        if (result.trim() != "") {
            var obj = JSON.parse(result);
            if (typeof(obj.logged_in) != "undefined" && !obj.logged_in) { //typedef e equivalente a isset em php

                window.location = "auth-normal-sign-in.php";

            }else{

                switch(obj.data_type){

                    case "user_info":
                        var username = _("username");
                        var username2 = _("username2");

                        var img_l = _("img_l");
                        var img_r = _("img_r");

                        username.innerHTML = obj.username;
                        username2.innerHTML = obj.username;

                        img_l.src = obj.image;
                        img_r.src = obj.image;
                        break;
                }   

            }

        }
    }

    function logout_user(){

        var answer = confirm("Tens certeza que pretende Terminar Sessão?");

        if (answer) {

            get_data({}, "logout");
        }

    }

    get_data({}, "user_info");

               
</script>
