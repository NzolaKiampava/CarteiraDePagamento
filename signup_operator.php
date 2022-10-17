<?php 
session_start();
require_once('classes/autoload.php');
require_once('header.php');
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

?>

   <style>

        #error{

            text-align: center; 
            padding: 0.5em; 
            background-color: #e88c95; 
            color: white; 
            margin: auto;
            display: none;
        }

   </style>

<div class="pcoded-content">
    <!-- Page-header start -->
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
                        <li class="breadcrumb-item">Perfil</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!--<div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Hello card</h5>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li>
                                                <i class="fa fa fa-wrench open-card-option"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-window-maximize full-card"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-minus minimize-card"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-refresh reload-card"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-trash close-card"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">-->
                                    <div class="page-body">

                                    <div class="row" style="background-color: white; margin-top: -37px;">
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card p-3">
                                                <div class="d-flex align-items-center">

                                                    <span class="stamp stamp-md mr-3">
                                                        <i class="fas fa-user-circle" style="font-size: 20pt;"></i>
                                                    </span>
                                                    <div>
                                                        <span style="font-size: 12pt; font-weight: bolder; color: #cecece;">PROCURAR PENSIONISTA</span><br>
                                                        <small style="color: #2b81f0;font-weight: bolder; font-size: 11pt; cursor: pointer;"  data-toggle="modal" data-target="#staticBackdrop">Clique Aquí</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br><br>

                                <div class="row" style="background-color: white;">
                                    <div class="col-sm-2">  
                                    </div>

                                    <div class="col-sm-8">
                                        <form id="myform_operator" method="post" enctype="multipart/form-data">
                                            <table class="table table-bordered table-hover">
                                                <tr align="center">
                                                    <td colspan="6"><h3>Cadastar Operador</h3></td>
                                                </tr>
                                                <tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">Email: </td>

                                                        <td>
                                                            <input class="form-control" type="email" name="email" required>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="font-weight: bold;">Nome Completo: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="username" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Género</td>

                                                        <td>

                                                        <input id="gender_male" value="Male" type="radio" name="gender" > <label for="gender_male"> Masculino</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="gender_female" value="Female" type="radio" name="gender"> <label for="gender_female"> Feminino</label>

                                                        
                                                     </td>
                                                 </tr>
                                            </td>
                                        </tr>
                                            
                                        <tr align="center">
                                            <td colspan="2">
                                                <input id="signup_operator" type="submit" class="btn btn-info" style="width: 230px; background-color:#50da70;" value="CADASTRAR OPERADOR" onclick="collect_data(event)">
                                            </td>
                                        </tr>

                                        <div id="error" class="row m-t-30">
                                            <div class="col-md-12">ERROS</div>
                                        </div>
                                    </table>
                                </form>  
                            </div>
                            <div class="col-sm-2">

                            </div>
                        </div>   
                                <!--</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div id="styleSelector"></div>
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
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="assets/js/script.min.js"></script>


    <!-- SEARCH PENSIONER MODAL -->

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" style="color: black;">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            
            <form method="get" class="search_form" action="">
                
                <label><h4 style="font-size:11pt;">Procura alguém</h4> </label>&nbsp;<input style="padding: 10px;margin: 10px;width: 56%;min-width: 20%; border-radius: 5px;border: solid 1px grey;" type="text" name="search_query" id="query" placeholder="Search friend"/><button  class="fa fa-search btn btn-secondary" style="width: 10%; padding: 7px; cursor: pointer;background-color: #007bff;color: white;" type="submit" name="search_btn" ></button> 
            </form>
        
            <div style="text-align: center;">
                
               <?php 
               $DB->search_user();?>
                 
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
    </div>

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

                    case "save_profile":
                        alert(obj.message);
                        get_data({}, "user_info"); //refreshing the user_info
                        window.location = "user-profile.php";
                    break;

                    case "signup_operator":
                        alert(obj.message);
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

    function show_password(){

        show_pass = "text"; 
        keep_pass = "password";
        mypass = _("mypass");

        if(mypass.type == "text"){

            mypass.type = keep_pass;

        }
        else{

            mypass.type = show_pass;
        } 
       
    }
    

</script>

<script type="text/javascript">
    
    function collect_data(e){
        e.preventDefault();

        var signup_operator = _("signup_operator");
        signup_operator.disabled = true;
        signup_operator.value = "Carregando..aguarde...";

        var myform_operator = _("myform_operator");
        var inputs = myform_operator.getElementsByTagName("INPUT");

        data = {};  //inicialisando um objecto vazio
        for (var i = inputs.length - 1; i >= 0; i--) {
            var key = inputs[i].name;

            switch(key){ //se o key for igual a um dos case faz:

                case "email":
                    data.email = inputs[i].value;
                    break;

                case "username":
                    data.username = inputs[i].value;
                    break;

                case "gender":
                   if(inputs[i].checked){
                        data.gender = inputs[i].value;  
                    }
                    break;
            }
        }
        send_data(data,"signup_operator");
    }

    function send_data(data, type){

        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if (xml.readyState == 4 || xml.status == 200) {

                handle_result2(xml.responseText);
                var signup_operator = _("signup_operator");
                signup_operator.disabled = false;
                signup_operator.value = "CADASTRAR OPERADOR";
   
            }
        }

        data.data_type = type;
        var data_string = JSON.stringify(data);  //convertendo para string a data a ser enviado

        xml.open("POST", "API.php", true);
        xml.send(data_string);
    }

   function handle_result2(result){
alert(result);
        var data = JSON.parse(result);

        if (data.data_type == "info") {

            alert(data.message);
            window.location = "signup_operator.php";
            
        }
        
        else{

          var error = _("error");
          error.innerHTML = data.message;  //writing the error message
          error.style.display = "block"; //displaying the message in block

        }
    }


</script>


