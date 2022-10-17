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
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                        <form id="myform" class="md-float-material form-material">
                            <div class="text-center">
                                <img src="assets/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Login</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="email" class="form-control" required="required">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Endereço do seu E-mail</label>
                                    </div>
                                    <div class="form-group form-primary">

                                        <input type="password" id="mypass" name="password" class="form-control" required="required">
                                        <span class="form-bar"></span>
                                        <label for="ver-palavra-passe" id="label" class="fa fa-eye-slash text-right f-right" style="cursor: pointer;position: absolute;top: 20px;right: 10px;" data-toggle="tooltip" title="ver palavra-passe"></label>
                                        <input id="ver-palavra-passe" type="radio" onclick="show_password()" style="display: none;">

                                        <label class="float-label">Palavra-passe</label>
                                    </div>
                                    
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="forgot-phone text-right f-right">
                                                <a href="#" class="text-right f-w-600"> Esqueci a minha palavra passe.</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <input type="submit" value="Login" id="login_button" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                        </div>
                                    </div>

                                    <div id="error" class="row m-t-30">
                                        <div class="col-md-12">ERROS</div>
                                    </div>

                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="forgot-phone text-right f-right">
                                                <a href="auth-sign-up.php" class="text-right f-w-600">Não tenho uma conta. Criar uma</a>
                                            </div>
                                        </div>
                                    </div>

                                    <hr/>
                                    <div class="row">
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
                        <!-- end of form -->
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

<script type="text/javascript">
    
    function _(element){

        return document.getElementById(element);
    }

    var login_button = _("login_button");
    login_button.addEventListener("click",collect_data);

    function collect_data(e){

        e.preventDefault();

        login_button.disable = true;
        login_button.value = "Carregando.....porfavor aguarde....";

        var myform = _("myform");
        var inputs = myform.getElementsByTagName("INPUT");

        var data = {};

        for (var i = 0; i < inputs.length; i++) {
            var key = inputs[i].name;

            switch(key){

                case "email":
                    data.email = inputs[i].value;
                    break;

                case "password":
                    data.password = inputs[i].value;
                    break;
            }
        }

        send_data(data, "login")

    }

    function send_data(data, type){

        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if (xml.readyState == 4 || xml.status == 200) {

                handle_result(xml.responseText);

                login_button.disable = false;
                login_button.value = "Login";
            }
        }

        data.data_type = type;
        var data_string = JSON.stringify(data);

        xml.open("POST", "API.php", true);
        xml.send(data_string);
    }

    function handle_result(result){

        var data = JSON.parse(result);

        if (data.data_type == "info") {

            window.location = "index.php";
        }
        else
        {
            var error = _("error");
            error.innerHTML = data.message;
            error.style.display = "block";
        }

    }


    //mostrar palavra-passe
    function show_password(){

        show_pass = "text"; 
        keep_pass = "password";
        novisible = "fa fa-eye-slash text-right f-right";
        visible = "fa fa-eye text-right f-right";

        mypass = _("mypass");
        label = _("label");

        if(mypass.type == "text"){

            mypass.type = keep_pass;
            label.className = novisible;

        }
        else{

            mypass.type = show_pass;
            label.className = visible;
        } 
       
    }

</script>
