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
                    <li class="breadcrumb-item">Factura
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <!-- Page-header end -->

<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <h2>Facturas</h2>
                <div class="row">
                    <!-- Material statustic card start -->
                    <div class="col-xl-10 col-md-14"  style="margin: auto;">
                        <div class="card mat-stat-card">
                            <div class="card-block">
                                <div class="row align-items-center b-b-default">
                                    <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-file-alt text-c-green f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>10K</h5>
                                                <p class="text-muted m-b-0">total das Facturas</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-check-circle text-c-green f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>100%</h5>
                                                <p class="text-muted m-b-0">Facturas Pagos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-6 p-b-20 p-t-20 b-r-default">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-file-alt text-c-red f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>2000+</h5>
                                                <p class="text-muted m-b-0">Facturas não Pagos</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-envelope-open text-c-blue f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>120</h5>
                                                <p class="text-muted m-b-0">Facturas Enviados</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Project statustic end -->
                </div>
            </div>
            <!-- Page-body end -->
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>

    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">

            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">

                    <!-- Basic table card start -->
                    <div class="card">

                        <div class="card-header">
                            <h5>Histórico de pagamento</h5>
                            <span>Veja todo o seu histórico efectuados nos últimos tempos</span>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>Beneficiário</th>
                                            <th>Email</th>
                                            <th>Tipo de Serviço</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>10-01-2021</td>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-1">
                                                    <div class="d-inline-block">
                                                        <h6>Shirley Hoe</h6>
                                                        <p class="text-muted m-b-0">Sales executive , NY</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>@Otto</td>
                                            <td>mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>10-01-2021</td>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-1">
                                                    <div class="d-inline-block">
                                                        <h6>Shirley Hoe</h6>
                                                        <p class="text-muted m-b-0">Sales executive , NY</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>@Thornton</td>
                                            <td>fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>10-01-2021</td>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-1">
                                                    <div class="d-inline-block">
                                                        <h6>Shirley Hoe</h6>
                                                        <p class="text-muted m-b-0">Sales executive , NY</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>@the Bird</td>
                                            <td>twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Basic table card end -->
                    <!-- Inverse table card start -->
                    <div class="card">
                    
                    <!-- Background Utilities table end -->
                </div>
                <!-- Page-body end -->
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

    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Custom js -->
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


