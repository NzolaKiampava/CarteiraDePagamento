<?php require_once('link_meta_head.php');?>

<style type="text/css">
    
    #error{

            text-align: center; 
            padding: 0.5em; 
            background-color: #e88c95; 
            color: white; 
            margin: auto;
            display: none;
    }
</style>


  <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form id="myform" class="md-float-material form-material">
                        <div class="text-center">
                            <img src="assets/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Increver-se</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Seu nome completo</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Endereço do seu E-mail</label>
                                </div>

                                <div class="row m-t-25 text-left">

                                    <div class="col-md-12">
                                        <h6>Género: </h6>
                                        <div class="checkbox-fade fade-in-primary">
                                           
                                            <input id="gender_male" type="radio" name="gender" value="Male">
                                            <label for="gender_male">Masculino</label>
        
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                           
                                            <input id="gender_female" type="radio" name="gender" value="Female">
                                            <label for="gender_female">Feminino</label>
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Palavra-passe</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password2" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Confirmar a palavra-passe</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                           
                                            <input id="checkbox1" type="checkbox" checked="checked" name="t_condic" required="required">
                                            <label for="checkbox">Aceito e concordo com <a href="#">Termos &amp; Condições.</a></label>
        
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                           
                                            <input id="checkboxs" type="checkbox" name="newltt" value="Newsletter">
                                            <label for="checkbox">Enviar-me <a href="#!">Newsletter</a> semanalmente.</label>
                                            
                                        </div>
                                    </div>

                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input id="signup_button" value="Inscrever Agora" type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                    </div>
                                </div>

                                <div id="error" class="row m-t-30">
                                    <div class="col-md-12">ERROS</div>
                                </div>

                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p style="float: right;"><a href="auth-normal-sign-in.php">Já tenho uma Conta</a></p>
                                    </div>
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Obrigado por usar o PSSP</p>
                                        <p class="text-inverse text-left"><b>Deloped by <a href="https://gme.ao/" style="color: #cc0000;">GM-Empreendimentos</a></b></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>


<!-- UTILIZANDO AJAX PARA COMUNICAÇAO ASSINCRONA COM A BASE DE DADOS -->
<script type="text/javascript">
    
    function _(element){

        return document.getElementById(element);
    }

    var signup_button = _("signup_button");
    signup_button.addEventListener("click", collect_data);

    function collect_data(e){
        e.preventDefault();
        signup_button.disabled = true;
        signup_button.value = "Carregando...porfavor aguarde....";

        var myform = _("myform");
        var inputs = myform.getElementsByTagName("INPUT");

        data = {};  //inicialisando um objecto vazio
        for (var i = inputs.length - 1; i >= 0; i--) {
            var key = inputs[i].name;

            switch(key){ //se o key for igual a um dos case faz:

                case "username":
                    data.username = inputs[i].value;
                    break;

                case "email":
                    data.email = inputs[i].value;
                    break;

                case "password":
                    data.password = inputs[i].value;
                    break;

                case "password2":
                    data.password2 = inputs[i].value;
                    break;

                case "gender":
                   if(inputs[i].checked){
                        data.gender = inputs[i].value;  
                    }
                    break; 
            }
        }
        send_data(data,"signup");
    }

    function send_data(data, type){

        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if (xml.readyState == 4 || xml.status == 200) {

                handle_result(xml.responseText);
                signup_button.disabled = false;
                signup_button.value = "Increver Agora";
   
            }
        }

        data.data_type = type;
        var data_string = JSON.stringify(data);  //convertendo para string a data a ser enviado

        xml.open("POST", "API.php", true);
        xml.send(data_string);
    }

    function handle_result(result){

        var data = JSON.parse(result);

        if (data.data_type == "info") {

            alert(data.message);
            window.location = "auth-normal-sign-in.php";
        }
        
        else{

          var error = _("error");
          error.innerHTML = data.message;  //writing the error message
          error.style.display = "block"; //displaying the message in block

        }
    }


</script>
