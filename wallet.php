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
<style type="text/css">

    nav#new_li li a{

        font-size: 14px;
        font-weight: bold;
        color: #fff;
    }

    nav#new_li li{
        display: inline-block; 
        background-color: #ccc; 
        padding: 10px; margin: 10px; 
        font-size: 16px; 
        font-weight: bold; 
        float: right; 
        border-top-left-radius: 20px; 
        border-top-right-radius: 20px; 
        border-bottom-left-radius: 20px; 
        border-bottom-right-radius: 20px;
        transition: all 1s ease;
    }
    nav#new_li li:hover{
        background-color: #448aff; 
    }

    #cardpr{

        border-top-left-radius: 20px; 
        border-top-right-radius: 20px; 
        border-bottom-left-radius: 20px; 
        border-bottom-right-radius: 20px;
        box-shadow: 0px 10px 0px #cecece;
    }

    #licard ul li{

        display: inline-block;
        margin: 14px;
    }

</style>

<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <!-- Material statustic card start -->
                    <div class="col-xl-8 col-md-12" >
                        <div class="card proj-progress-card" id="cardpr">
                            <div class="card-block">
                                <div>
                                    <nav id="licard">
                                        <ul>
                                            <li>
                                                <img src="assets/images/wallet-filled-money-tool.png" style="width: 56px;"><br>
                                            </li>
                                            <li>
                                                <h6 style="font-weight: bold;">Balanço Principal</h6>
                                                <h4 style="font-weight: bolder;">$6864,90</h4>
                                            </li>
                                            <li>
                                                <h6>Validade</h6>
                                                <h6>8/2</h6>
                                            </li>
                                            <li>
                                                <h6>Titular do cartão</h6>
                                                <h6>username</h6>
                                            </li>
                                            <li>
                                                <h6>**** **** **** 1234</h6>
                                            </li>
                                        </ul>
                                        
                                    </nav>    

                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-c-green" style="width:89%"></div>
                                </div><br>
                                <div class="row">

                                    <div class="col-xl-3 col-md-6">
                                        <h6>Prestação</h6>
                                        <h5 class="m-b-30 f-w-700">$4,569<span class="text-c-red m-l-10">-0.5%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-blue" style="width:65%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <h6>Investimento</h6>
                                        <h5 class="m-b-30 f-w-700">$89<span class="text-c-green m-l-10">+0.99%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-green" style="width:85%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <h6>Bens</h6>
                                        <h5 class="m-b-30 f-w-700">$365<span class="text-c-green m-l-10">+0.35%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-c-yellow" style="width:45%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-4 col-md-12">
                        <div class="card mat-clr-stat-card text-white green ">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-3 text-center bg-c-green">
                                        <i class="fas fa-download mat-icon f-24"></i>
                                    </div>

                                    <div class="col-9 cst-cont">
                                        <a href="#" style="color: white;"><h5>Transferir</h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mat-clr-stat-card text-white blue">
                            <div class="card-block">

                                <div class="row">
                                    <div class="col-3 text-center bg-c-blue">
                                        <i class="fas fa-file mat-icon f-24"></i>
                                    </div>
                                    <div class="col-9 cst-cont">
                                        <a href="#" style="color: white;"><h5>Enviar Factura</h5></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Material statustic card end -->
                    <!-- order-visitor start -->


                    <!-- order-visitor end -->

                    <!--  sale analytics start -->

                    <div class="col-xl-8 col-md-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h5>Histórico de pagamento</h5>
                                <nav id="new_li">
                                    <li><a href="#">Today</a></li>
                                    <li><a href="#">Month</a></li>
                                    <li><a href="#">Weekly</a></li>
                                </nav>
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
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0 without-header">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-1">
                                                        <div class="d-inline-block">
                                                            <h6>Shirley Hoe</h6>
                                                            <p class="text-muted m-b-0">Sales executive , NY</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">Aqui vai data</h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">$78.001<i class="fas fa-level-down-alt text-c-red"></i></h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">O tipo de pagamento - VISA</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-1">
                                                        <div class="d-inline-block">
                                                            <h6>James Alexander</h6>
                                                            <p class="text-muted m-b-0">Sales executive , EL</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">Aqui vai data</h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">$78.001<i class="fas fa-level-down-alt text-c-red"></i></h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">O tipo de pagamento - VISA</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-1">
                                                        <div class="d-inline-block">
                                                            <h6>Shirley Hoe</h6>
                                                            <p class="text-muted m-b-0">Sales executive , NY</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">Aqui vai data</h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">$78.001<i class="fas fa-level-down-alt text-c-red"></i></h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">O tipo de pagamento - VISA</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-1">
                                                        <div class="d-inline-block">
                                                            <h6>Nick Xander</h6>
                                                            <p class="text-muted m-b-0">Sales executive , EL</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">Aqui vai data</h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">$78.001<i class="fas fa-level-up-alt text-c-green"></i></h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-700">O tipo de pagamento - VISA</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-4 col-md-2" style="float: left; margin-top: -100px;">

                        <div class="card table-card" class="col-md-2" style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-left-radius: 30px;border-bottom-right-radius: 30px; padding: 6px;">
                            <div class="card-header">
                                <h5>Facturas enviadas</h5>
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
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0 without-header">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>Shirley Hoe</h6>
                                                            <p class="text-muted m-b-0">Sales executive , NY</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <h6 class="f-w-700">$78.001</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>James Alexander</h6>
                                                            <p class="text-muted m-b-0">Sales executive , EL</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <h6 class="f-w-700">$89.051</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                        <div class="d-inline-block">
                                                            <h6>Shirley Hoe</h6>
                                                            <p class="text-muted m-b-0">Sales executive , NY</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <h6 class="f-w-700">$89.051</h6>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>

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

<!-- slimscroll js -->
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

<!-- menu js -->
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/vertical/vertical-layout.min.js "></script>

<script type="text/javascript" src="assets/js/script.js "></script>
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
