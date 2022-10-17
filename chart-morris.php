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
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <!-- SITE VISIT CHART start -->
                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Site Visit Chart</h5>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                                <div class="card-block">
                                    <div id="morris-site-visit"></div>
                                </div>
                            </div>
                        </div>
                        <!-- SITE VISIT CHART Ends -->
                        <!-- Bar Chart start -->
                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Bar Chart</h5>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                                <div class="card-block">
                                    <div id="morris-bar-chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Bar Chart Ends -->
                        <!-- EXTRA AREA CHART start -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Extra Area Chart</h5>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                                <div class="card-block">
                                    <div id="morris-extra-area"></div>
                                </div>
                            </div>
                        </div>
                        <!-- EXTRA AREA CHART Ends -->
                        <!-- Area Chart start -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Area Chart</h5>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                                <div class="card-block">
                                    <div id="area-example"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart Ends -->
                        <!-- LINE CHART start -->
                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Line Chart</h5>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                                <div class="card-block">
                                    <div id="line-example"></div>
                                </div>
                            </div>
                        </div>
                        <!-- LINE CHART Ends -->
                        <!-- Donut chart start -->
                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Donut Chart</h5>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                                <div class="card-block">
                                    <div id="donut-example"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Donut chart Ends -->
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Morris Chart js -->
    <script src="assets/js/raphael/raphael.min.js"></script>
    <script src="assets/js/morris.js/morris.js"></script>
    <!-- Custom js -->
    <script src="assets/pages/chart/morris/morris-custom-chart.js"></script>
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
