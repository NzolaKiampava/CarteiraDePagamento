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
                    <!-- Material statustic card start -->
                    <div class="col-xl-4 col-md-12">
                        <div class="card mat-stat-card">
                            <div class="card-block">
                                <div class="row align-items-center b-b-default">
                                    <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-copy text-c-purple f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <?php 
                                                    $query = "SELECT * FROM pensioner";
                                                    $res = $DB->read($query, []);
                                                    if (is_array($res)) 
                                                        echo "<h5>".count($res)."</h5>";
                                                    else
                                                         echo "<h5>0</h5>"; 
                                                   
                                                ?>
                                                <p class="text-muted m-b-0">Pensionistas</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-file-alt text-c-red f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <?php 
                                                    $query = "SELECT * FROM users";
                                                    $res = $DB->read($query, []);
                                                    if (is_array($res)) 
                                                        echo "<h5>".count($res)."</h5>";
                                                    else
                                                         echo "<h5>0</h5>"; 
                                                ?>
                                                <p class="text-muted m-b-0">Operadores</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card mat-stat-card">
                            <div class="card-block">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 p-b-20 p-t-20 b-r-default">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-file-alt text-c-green f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <!-- EM PROCESSAMENTO-->
                                                <?php 
                                                    $id_operador = $_SESSION['userid'];
                                                    $query = "SELECT * FROM pensioner where id_operador = '$id_operador'";
                                                    $res = $DB->read($query, []);
                                                    if (is_array($res)) 
                                                        echo "<h5>".count($res)."</h5>";
                                                    else
                                                         echo "<h5>0</h5>"; 
                                                ?>
                                                <p class="text-muted m-b-0">Facturas pago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-envelope-open text-c-blue f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <!-- EM PROCESSAMENTO-->
                                                <?php 
                                                    $id_operador = $_SESSION['userid'];
                                                    $query = "SELECT * FROM pensioner where country = 'Angola'";
                                                    $res = $DB->read($query, []);
                                                    if (is_array($res)) 
                                                        echo "<h5>".count($res)."</h5>";
                                                    else
                                                         echo "<h5>0</h5>"; 
                                                ?>
                                                <p class="text-muted m-b-0">Facturas enviados</p>
                                            </div>
                                            
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
                                        <span style="cursor: pointer;"  data-toggle="modal" data-target="#transferirModal" style="color: white;"><h5>Transferir</h5></span>
                                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                          Turn On
                                      </button>-->

                                      <!-- Modal -->
                                      <?php require_once('transferirModal.php');?>
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
                                <span style="cursor: pointer;"  data-toggle="modal" data-target="#faturaModal" style="color: white;"><h5>Enviar Factura</h5></span>

                                <!-- Modal -->
                                <div class="modal fade" id="faturaModal">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" style="color: black;">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="recove-password.php" method="post" id="f">
                                            <strong style="color: black;">What is your best friend name?</strong>
                                            <textarea class="form-control" cols="83" rows="4" name="content" placeholder="Someone"></textarea><br>
                                            <input class="btn btn-default" type="submit" name="sub" value="submit" style="width: 100px;"><br><br>
                                            <pre>Answer the above question we will ask this question if you forgot your <br>password.</pre><br><br>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Material statustic card end -->
    <!-- order-visitor start -->


    <!-- order-visitor end -->

    <!--  sale analytics start -->
    <div class="col-xl-6 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Transições efectuadas</h5>
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

                            <?php

                                $query = "SELECT * FROM pensioner";
                                
                                $dados = $DB->read($query,[]);

                                if (is_array($dados)) 
                                {  
                                    
                                    
                                    foreach ($dados as $key => $value) 
                                    {
                                        $image = ($value->gender== "Masculino") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

                                        /*if (file_exists($value->image)) 
                                        {
                                            $image = $value->image;
                                        }*/

                                        if($value->bank == 'BPC')
                                            $class = "<i class='fas fa-level-up-alt text-c-green m-l-10'></i>";
                                        else
                                            $class = "<i class='fas fa-level-down-alt text-c-red m-l-10'></i>";
                                        
                                        
                                        echo "

                                            <tr>
                                                <td>
                                                    <div class='d-inline-block align-middle'>
                                                        <img src='$image' alt='user image' class='img-radius img-40 align-top m-r-15'>
                                                        <div class='d-inline-block'>
                                                            <h6>".$value->username."</h6>
                                                            <p class='text-muted m-b-0'>".$value->email."</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class='text-right'>
                                                    <h6 class='f-w-700'>".$value->bank."".$class."</h6>
                                                </td>
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
    </div>
    <div class="col-xl-6 col-md-12">
        <div class="row">
            <!-- sale card start -->

            <div class="col-md-6">
                <div class="card text-center order-visitor-card">
                    <div class="card-block">
                        <h6 class="m-b-0">Transições não Efectuados</h6>
                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-down m-r-15 text-c-red"></i>7652</h4>
                        <p class="m-b-0">48% From Last 24 Hours</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center order-visitor-card">
                    <div class="card-block">
                        <h6 class="m-b-0">Transições Efectuados</h6>
                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-up m-r-15 text-c-green"></i>6325</h4>
                        <p class="m-b-0">36% From Last 6 Months</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-c-red total-card">
                    <div class="card-block">
                        <div class="text-left">

                            <h4>489</h4>
                            <p class="m-0">Total de gastos na Carteira</p>
                        </div>
                        <span class="label bg-c-red value-badges">15%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-c-green total-card">
                    <div class="card-block">
                        <div class="text-left">
                            <h4>$5782</h4>
                            <p class="m-0">Dinheiro na Carteira</p>
                        </div>
                        <span class="label bg-c-green value-badges">20%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center order-visitor-card">
                    <div class="card-block">
                        <h6 class="m-b-0">Facturas não Efectuados</h6>
                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-down m-r-15 text-c-red"></i>652</h4>
                        <p class="m-b-0">36% From Last 6 Months</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center order-visitor-card">
                    <div class="card-block">
                        <h6 class="m-b-0">Facturas Efectuados</h6>
                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-up m-r-15 text-c-green"></i>5963</h4>
                        <p class="m-b-0">36% From Last 6 Months</p>
                    </div>
                </div>
            </div>
            <!-- sale card end -->
        </div>
    </div>

    <!--  sale analytics end -->

    <!-- Project statustic start -->

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
        //alert(result);

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

    get_data({}, "user_info");

    function logout_user(){

        var answer = confirm("Tens certeza que pretende Terminar Sessão?");

        if (answer) {

            get_data({}, "logout");
        }

    }

    function get_profile(){

        get_data({}, "user_profile");
    }


    
</script>

