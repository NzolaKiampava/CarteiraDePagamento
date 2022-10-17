<?php
    
session_start();
require_once('classes/autoload.php');
require_once('classes/Database.php');

$DB = new Database();

$info = (object)[];  //empty object

//logout
if (!isset($_SESSION['userid'])) 
{
    if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type != "login" && $DATA_OBJ->data_type != "signup") 
    {
        $info->logged_in = false;
        echo json_encode($info);
        die;
    }
}

require_once('header.php');
?>


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
                    <li class="breadcrumb-item">Histórico
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
                <!-- Page-body start -->
                <div class="page-body">

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md mr-3">
                                        <i class="fa fa-dollar-sign" style="font-size: 17pt;"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">132 <small>Sales</small></a></b></h5>
                                        <small class="text-muted">12 waiting payments</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md mr-3">
                                        <i class="fa fa-shopping-cart" style="font-size: 17pt;"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">78 <small>Orders</small></a></b></h5>
                                        <small class="text-muted">32 shipped</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md mr-3">
                                        <i class="fa fa-users" style="font-size: 17pt;"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">1,352 <small>Members</small></a></b></h5>
                                        <small class="text-muted">163 registered today</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md  mr-3">
                                        <i class="fa fa-comment-alt" style="font-size: 17pt;"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">132 <small>Comments</small></a></b></h5>
                                        <small class="text-muted">16 waiting</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                    <li onclick="refresh(event)"><i class="fa fa-refresh reload-card"></i></li>
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
                                            <th>Banco</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $query = "SELECT * FROM pensioner";
                                
                                            $dados = $DB->read($query,[]);

                                            if (is_array($dados)) 
                                            { 
                                                
                                                foreach ($dados as $key => $value) 
                                                {
                                                    $image = ($value->gender== "Masculino") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

                                                   /* if (file_exists($value->image)) 
                                                    {
                                                        $image = $value->image;
                                                    }*/
                                                    echo "
                                                        <tr>
                                                        <td>".$value->id."</td>
                                                        <td>".$value->date."</td>
                                                        <td>
                                                            <div class='d-inline-block align-middle'>
                                                                    <img src='$image' alt='user image' class='img-radius img-40 align-top m-r-1'>
                                                                    <div class='d-inline-block'>
                                                                        <h6>".$value->username."</h6>
                                                                        <p class='text-muted m-b-0'>".$value->email."</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>".$value->email."</td>
                                                        <td>".$value->bank."</td>
                                                        </tr>

                                                    ";
                                                }
                                            }

                                        ?>
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
<!-- Page-body end -->
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


<!-- Main-body end -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Accordion js -->
<script type="text/javascript" src="assets/pages/accordion/accordion.js"></script>
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

    function refresh(e){
        setTimeout(function(){ window.location = "history.php";}, 2000);
    }

</script>


