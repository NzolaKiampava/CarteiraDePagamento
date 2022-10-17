
<?php 
session_start();
require_once('classes/autoload.php');
require_once('classes/Database.php');
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


$sql = "select * from users where userid = :userid limit 1";
$id = $_SESSION['userid'];
$data = $DB->read($sql, ['userid'=>$id]);

$sql2 = "select * from users where userid != '$id' limit 10";
$myusers = $DB->read($sql2, []);

if (is_array($data)) 
{
   $mydata = ''; 
   $data = $data[0];

   $mydata = '
        <div class="pcoded-content">
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Sample page</h5>
                                <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Sample page</a>
                                </li>
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

                                         <div class="row" style="background-color: white;">
                                             <div class="col-sm-2">  
                                             </div>

                                             <div class="col-sm-8">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <table class="table table-bordered table-hover">
                                                    <tr align="center">
                                                            <td colspan="6"><h3>Lista de Contactos</h3></td>
                                                        </tr>';

                                                    foreach ($myusers as $row)
                                                    {
                                                        

                                                        $image = ($row->gender == "Male") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

                                                        if (file_exists($row->image)) 
                                                        {
                                                            $image = $row->image;
                                                        }
                                                        
                                                        $mydata .= "   
                                                        <tr>
                                                            <tr>
                                                                <td><style='font-weight: bold;'><img src='$image' style='width: 60px; border:solid thin white; border-radius: 50%; margin-top:-10px;'>
                                                                </td>
                                                                <td>
                                                                    <input class='form-control' type='email' name='u_name' required value='$row->username' readonly>
                                                                </td>
                                                                <td>
                                                                    <input class='form-control' type='email' name='u_email' required value='$row->email' readonly>
                                                                </td>
                                                            </tr> 
                                                            </tr>"; 
                                                        
                                                    }
                                                    
                                                    $mydata .= '    
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

        ';

echo $mydata;
}







