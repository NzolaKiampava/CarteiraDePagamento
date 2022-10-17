<?php require_once('header.php');?>


<style type="text/css">
    
    #menu li{
        display: inline-block;
        margin: 20px;
    }


     
</style>

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
                    <li class="breadcrumb-item">Transição
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <!-- Page-header end -->

        <div class="col-md-12">
            <h2>Histórico de Transição</h2>
            <ul id="menu">
                <br>
                <li>
                    <div class="dropdown-info dropdown open">
                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;border-top-right-radius: 20px;border-top-left-radius: 20px; width: 100%; background-color: white; color: #448aff"><span style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; border-top-right-radius: 10px; border-top-left-radius: 10px; width: 20%; background-color: orange;">...........</span> Orange Card</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item waves-light waves-effect" href="#"><span style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; border-top-right-radius: 10px; border-top-left-radius: 10px; width: 20%; background-color: #cc0000;">...........</span> Red Card</a>
                            <a class="dropdown-item waves-light waves-effect" href="#"><span style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; border-top-right-radius: 10px; border-top-left-radius: 10px; width: 20%; background-color: black;">...........</span> Black Card</a>
                            <a class="dropdown-item waves-light waves-effect" href="#"><span style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; border-top-right-radius: 10px; border-top-left-radius: 10px; width: 20%; background-color: blue;">...........</span> Blue Card</a>
                        </div>
                    </div>
                </li>

                <li>  

                    <span class="fas fa-download" style="
                    color: #448aff;
                    padding: 10px;
                    background-color: #fff;
                    transition: all 1s ease;
                    border: 2px solid #448aff;
                    border-top-left-radius: 20px; 
                    border-top-right-radius: 20px; 
                    border-bottom-left-radius: 20px; 
                    border-bottom-right-radius: 20px;"><a href="#"> Transmitir Download</a></span>

                </li>

                <li>
                    <span style="
                    color: #448aff;
                    padding: 10px;
                    background-color: #fff;
                    transition: all 1s ease;
                    border: 2px solid #448aff;
                    border-top-left-radius: 20px; 
                    border-top-right-radius: 20px; 
                    border-bottom-left-radius: 20px; 
                    border-bottom-right-radius: 20px;"><label for="data">Filtar Data</label><input type="date" name="date" id="data">
                </span> 

            </li>
        </ul>
</div>
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page body start -->
                <div class="page-body">

                    <div class="row">
                       
                        <br><br><br>
                        <div class="card col-md-12">

                        <div class="card-header">
                            <h5>Hisórico de Transições</h5>
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
                                            <th>Valor</th>
                                            <th>Tipo de Serviço</th>
                                            <th>Location</th>
                                            <th>Estado</th>
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
                                            <td>$3263,90</td>
                                            <td>iNFORMATICA</td>
                                            <td>Angola, Luanda-Kilamba Kiaxi</td>
                                            <td>
                                                <span style="
                                                color: #448aff;
                                                padding: 10px;
                                                background-color: #fff;
                                                transition: all 1s ease;
                                                border: 2px solid #448aff;
                                                border-top-left-radius: 20px; 
                                                border-top-right-radius: 20px; 
                                                border-bottom-left-radius: 20px; 
                                                border-bottom-right-radius: 20px;">Completo</span>
                                            </td>
                                            <td class="dropdown-info dropdown open" >
                                                
                                                <i  class="fas fa-ellipsis-v " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>
                                                <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                    <a class="dropdown-item waves-light waves-effect " href="#"><span class="far fa-times-circle text-danger"></span> Cancelar Transição</a>
                                                    <a class="dropdown-item waves-light waves-effect" href="transition-detail.php"><span class="fas fa-eye"></span> Ver Detalhes</a>
                                                    
                                                </div>
                                            </td>
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
                                            <td>$3263,90</td>
                                            <td>iNFORMATICA</td>
                                            <td>Angola, Luanda-Kilamba Kiaxi</td>
                                            <td>
                                                <span style="
                                                color: green;
                                                padding: 10px;
                                                background-color: #fff;
                                                transition: all 1s ease;
                                                border: 2px solid green;
                                                border-top-left-radius: 20px; 
                                                border-top-right-radius: 20px; 
                                                border-bottom-left-radius: 20px; 
                                                border-bottom-right-radius: 20px;">Completo</span>
                                            </td>
                                            <td class="dropdown-info dropdown open" >
                                                
                                                <i  class="fas fa-ellipsis-v " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>
                                                <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                    <a class="dropdown-item waves-light waves-effect" href="#"><span class="far fa-times-circle text-danger"></span> Cancelar Transição</a>
                                                    <a class="dropdown-item waves-light waves-effect" href="transition-detail.php"><span class="fas fa-eye"></span> Ver Detalhes</a>
                                                    
                                                </div>
                                            </td>
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
                                            <td>$3263,90</td>
                                            <td>iNFORMATICA</td>
                                            <td>Angola, Luanda-Kilamba Kiaxi</td>
                                            <td>
                                                <span style="
                                                color: #cc0000;
                                                padding: 10px;
                                                background-color: #fff;
                                                transition: all 1s ease;
                                                border: 2px solid #cc0000;
                                                border-top-left-radius: 20px; 
                                                border-top-right-radius: 20px; 
                                                border-bottom-left-radius: 20px; 
                                                border-bottom-right-radius: 20px;">Completo</span>
                                            </td>
                                            <td class="dropdown-info dropdown open" >
                                                
                                                <i  class="fas fa-ellipsis-v " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>

                                                <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                    <a class="dropdown-item waves-light waves-effect" href="#"><span class="far fa-times-circle text-danger"></span> Cancelar Transição</a>
                                                    <a class="dropdown-item waves-light waves-effect" href="transition-detail.php"><span class="fas fa-eye"></span> Ver Detalhes</a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div>
                <!-- Page body end -->
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
