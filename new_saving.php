<?php 
session_start();
require_once('classes/autoload.php');

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

//se usuario clicar em ver
if(isset($_GET['id_up']) && !empty($_GET['id_up']))
{
    $id_pessoa = addslashes($_GET['id_up']);
    $res = $DB->buscarDadosPessoa($id_pessoa);

    if ($res['gender'] == "Masculino") 
        $gender_male = "checked"; //if is, gender_male recieve checked
    else
        $gender_female = "checked"; //if is, gender_male recieve checked

    if (isset($_POST['username'])) // se o usuario clicar no botao
    {
        //$id_up = addslashes($_GET['id_up']);
        $data = false;

        $data['id_up']            = addslashes($id_pessoa);

        $data['email']            = addslashes($_POST['email']);
        $data['u_phone']          = addslashes($_POST['u_phone']);
        $data['username']         = addslashes($_POST['username']);
        $data['father_name']      = addslashes($_POST['father_name']);
        $data['mother_name']      = addslashes($_POST['mother_name']);
        $data['gender']           = isset($_POST['gender']) ? addslashes($_POST['gender']) : null;
        $data['bi_number']        = addslashes($_POST['bi_number']);
        $data['residence']        = addslashes($_POST['residence']);
        $data['naturality']       = addslashes($_POST['naturality']);
        $data['province']         = addslashes($_POST['province']);
        $data['country']          = addslashes($_POST['country']);
        $data['birthdate']        = addslashes($_POST['birthdate']);
        $data['civil_status']     = addslashes($_POST['civil_status']);
        $data['bi_emission_date'] = addslashes($_POST['bi_emission_date']);
        $data['bank']             = addslashes($_POST['bank']);
        $data['u_count']          = addslashes($_POST['u_count']);
        $data['iban']             = addslashes($_POST['iban']);

        if (!empty($data))
        {
           $query = "UPDATE pensioner set username = :username, email = :email, telefone=:u_phone, gender = :gender, full_name = :username, father_name = :father_name, mother_name = :mother_name, bi_number = :bi_number, residence = :residence, naturalness = :naturality, province = :province, country = :country, birthdate = :birthdate, civil_status = :civil_status, bi_emission_date = :bi_emission_date, bank_count_number = :bank, bank_count_number = :u_count, bank_iban = :iban WHERE id = :id_up limit 1"; //limit to edit only one row

            $result = $DB->write($query,$data);
            if ($result) 
            {
                echo "<script>alert('Pensionista foi actualizado!')</script>";
                header('location: signup_pensioner.php');
            }else
                echo "<script>alert('Pensionista não foi actualizado devido algum erro!')</script>";
        }else{
            echo "<script>alert('Preencha todos os campos!')</script>";
        }
   
    }
}
require_once('header.php');
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
                                        <form id="myform_pensioner" method="post" enctype="multipart/form-data">
                                            <table class="table table-bordered table-hover">
                                                <tr align="center">
                                                    <td colspan="6"><h3>Nova Poupança</h3></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <tr>
                                                        <td style="font-weight: bold;">Valor </td>

                                                        <td>
                                                            <input class="form-control" type="number" name="amount"  value="<?php //if(isset($res)){ echo $res['username'];}?>" required>
                                                        </td>
                                                    </tr>
                                                </tr>

                                                <tr>
                                                    <td style="font-weight: bold;">Poupança de origem</td>

                                                    <td>
                                                        <input class="form-control" type="text" name="saving_source" value="<?php //if(isset($res)){ echo $res['civil_status'];}?>" list="ss" required>
                                                        <datalist id="ss">

                                                            <option value="TPA">
                                                            <option value="Depósito bancário">
                                                            <option value="Transferência">
                                                            <option value="Débto directo em salário">
                                                            
                                                        </datalist>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-weight: bold;">Conta de Origem </td>

                                                    <td>
                                                        <input class="form-control" type="text" name="ac_source"  value="<?php //if(isset($res)){ echo $res['username'];}?>" required>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-weight: bold;">Empresa de Origem </td>
 
                                                    <td>
                                                        <input class="form-control" type="text" name="comp_source"  value="<?php //if(isset($res)){ echo $res['username'];}?>" required>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-weight: bold;">Conta de destino </td>

                                                    <td>
                                                        <input class="form-control" type="text" name="ac_source"  value="<?php //if(isset($res)){ echo $res['username'];}?>" required>
                                                    </td>
                                                </tr>   
                                    
                                                <tr align="center">
                                                    <td colspan="2">
                                                        <input id="signup_pensioner" type="submit" class="btn btn-info" style="width: 206px; background-color:#50da70; padding: 10px;" value="CADASTRAR">
                                                    </td>
                                                </tr>

                                                <div id="error" class="row m-t-30">
                                                    <div class="col-md-12"></div>
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
            
            <form method="post" class="search_form" action="">
                
                <label><h4 style="font-size:11pt;">Procurar</h4> </label>&nbsp;<input style="padding: 10px;margin: 10px;width: 56%;min-width: 20%; border-radius: 5px;border: solid 1px grey;" type="text" name="pesquisa" id="pesquisa" placeholder="Procurar pensionista"/>
            </form>
        
            <div style="text-align: center;">
                <div class="resultado">
                    
                </div>


                <!--<div>
                    <h2>Todos os pensionistas</h2>
                    <?php 
                    $DB->search_user();?>
                </div>-->
               
                 
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

                    case "signup_pensioner":
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

        var signup_pensioner = _("signup_pensioner");
        signup_pensioner.disabled = true;
        signup_pensioner.value = "Carregando..aguarde...";

        var myform_pensioner = _("myform_pensioner");
        var inputs = myform_pensioner.getElementsByTagName("INPUT");

        data = {};  //inicialisando um objecto vazio
        for (var i = inputs.length - 1; i >= 0; i--) {
            var key = inputs[i].name;

            switch(key){ //se o key for igual a um dos case faz:

                case "email":
                    data.email = inputs[i].value;
                    break;

                case "u_phone":
                    data.u_phone = inputs[i].value;
                    break;

                case "username":
                    data.username = inputs[i].value;
                    break;

                case "father_name":
                    data.father_name = inputs[i].value;
                    break;

                case "mother_name":
                    data.mother_name = inputs[i].value;
                    break;

                case "bi_number":
                    data.bi_number = inputs[i].value;
                    break;

                case "residence":
                    data.residence = inputs[i].value;
                    break;

                case "naturality":
                    data.naturality = inputs[i].value;
                    break;

                case "province":
                    data.province = inputs[i].value;
                    break;

                case "country":
                   data.country = inputs[i].value;
                   break;

                case "birthdate":
                    data.birthdate = inputs[i].value;
                    break;

                case "gender":
                   if(inputs[i].checked){
                        data.gender = inputs[i].value;  
                    }
                    break; 

                case "civil_status":
                    data.civil_status = inputs[i].value;
                    break;

                case "bi_emission_date":
                    data.bi_emission_date = inputs[i].value;
                    break;

                case "bank":
                    data.bank = inputs[i].value;
                    break;

                case "u_count":
                    data.u_count = inputs[i].value;
                    break;

                case "iban":
                    data.iban = inputs[i].value;
                    break;
            }
        }
        send_data(data,"signup_pensioner");
    }

    function send_data(data, type){

        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if (xml.readyState == 4 || xml.status == 200) {

                handle_result2(xml.responseText);
                var signup_pensioner = _("signup_pensioner");
                signup_pensioner.disabled = false;
                signup_pensioner.value = "CADASTRAR PENSIONISTA";
   
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
            window.location = "signup_pensioner.php";
            
        }
        
        else{

          var error = _("error");
          error.innerHTML = data.message;  //writing the error message
          error.style.display = "block"; //displaying the message in block

        }
    }


</script>


