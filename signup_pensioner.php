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
                                                    <td colspan="6"><h3>Cadastar Pensionista</h3></td>
                                                </tr>
                                                <tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">Email: </td>

                                                        <td>
                                                            <input class="form-control" type="email" name="email" value="<?php if(isset($res)){ echo $res['email'];}?>" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">Telefone: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="u_phone" value="<?php if(isset($res)){ echo $res['telefone'];}?>" required value="">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td colspan="2" style="font-weight: bold;">Dados Biográficos</td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Nome Completo: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="username"  value="<?php if(isset($res)){ echo $res['username'];}?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Nome Completo do Pai: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="father_name" value="<?php if(isset($res)){ echo $res['father_name'];}?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Nome Completo da Mãe: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="mother_name" value="<?php if(isset($res)){ echo $res['mother_name'];}?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Número de BI: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="bi_number" value="<?php if(isset($res)){ echo $res['bi_number'];}?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Residência: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="residence" value="<?php if(isset($res)){ echo $res['residence'];}?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Natural de: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="naturality" value="<?php if(isset($res)){ echo $res['naturalness'];}?>" required>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="font-weight: bold;">Província/Estado: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="province" value="<?php if(isset($res)){ echo $res['province'];}?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">País</td>
                                                        <td>
                                                        <input class="form-control" type="text" value="<?php if(isset($res)){ echo $res['country'];}?>" name="country" list="all_country" required>
                                                        
                                                            <datalist  id="all_country">

                                                                <option value="Afghanistan">
                                                                <option value="Åland Islands">
                                                                <option value="Albania">
                                                                <option value="Algeria">
                                                                <option value="American Samoa">
                                                                <option value="Andorra">
                                                                <option value="Angola" selected>
                                                                <option value="Anguilla">
                                                                <option value="Antarctica">
                                                                <option value="Antigua and Barbuda">
                                                                <option value="Argentina">
                                                                <option value="Armenia">
                                                                <option value="Aruba">
                                                                <option value="Australia">
                                                                <option value="Austria">
                                                                <option value="Azerbaijan">
                                                                <option value="Bahamas">
                                                                <option value="Bahrain">
                                                                <option value="Bangladesh">
                                                                <option value="Barbados">
                                                                <option value="Belarus">
                                                                <option value="Belgium">
                                                                <option value="Belize">
                                                                <option value="Benin">
                                                                <option value="Bermuda">
                                                                <option value="Bhutan">
                                                                <option value="Bolivia">
                                                                <option value="Bosnia and Herzegovina">
                                                                <option value="Botswana">
                                                                <option value="Bouvet Island">
                                                                <option value="Brazil">
                                                                <option value="British Indian Ocean Territory">
                                                                <option value="Brunei Darussalam">
                                                                <option value="Bulgaria">
                                                                <option value="Burkina Faso">
                                                                <option value="Burundi">
                                                                <option value="Cambodia">
                                                                <option value="Cameroon">
                                                                <option value="Canada">
                                                                <option value="Cape Verde">
                                                                <option value="Cayman Islands">
                                                                <option value="Central African Republic">
                                                                <option value="Chad">
                                                                <option value="Chile">
                                                                <option value="China">
                                                                <option value="Christmas Island">
                                                                <option value="Cocos (Keeling) Islands">
                                                                <option value="Colombia">
                                                                <option value="Comoros">
                                                                <option value="Congo">
                                                                <option value="Congo, The Democratic Republic of The">
                                                                <option value="Cook Islands">
                                                                <option value="Costa Rica">
                                                                <option value="Cote Divoire">
                                                                <option value="Croatia">
                                                                <option value="Cuba">
                                                                <option value="Cyprus">
                                                                <option value="Czech Republic">
                                                                <option value="Denmark">
                                                                <option value="Djibouti">
                                                                <option value="Dominica">
                                                                <option value="Dominican Republic">
                                                                <option value="Ecuador">
                                                                <option value="Egypt">
                                                                <option value="El Salvador">
                                                                <option value="Equatorial Guinea">
                                                                <option value="Eritrea">
                                                                <option value="Estonia">
                                                                <option value="Ethiopia">
                                                                <option value="Falkland Islands (Malvinas)">
                                                                <option value="Faroe Islands">
                                                                <option value="Fiji">
                                                                <option value="Finland">
                                                                <option value="France">
                                                                <option value="French Guiana">
                                                                <option value="French Polynesia">
                                                                <option value="French Southern Territories">
                                                                <option value="Gabon">
                                                                <option value="Gambia">
                                                                <option value="Georgia">
                                                                <option value="Germany">
                                                                <option value="Ghana">
                                                                <option value="Gibraltar">
                                                                <option value="Greece">
                                                                <option value="Greenland">
                                                                <option value="Grenada">
                                                                <option value="Guadeloupe">
                                                                <option value="Guam">
                                                                <option value="Guatemala">
                                                                <option value="Guernsey">
                                                                <option value="Guinea">
                                                                <option value="Guinea-bissau">
                                                                <option value="Guyana">
                                                                <option value="Haiti">
                                                                <option value="Heard Island and Mcdonald Islands">
                                                                <option value="Holy See (Vatican City State)">
                                                                <option value="Honduras">
                                                                <option value="Hong Kong">
                                                                <option value="Hungary">
                                                                <option value="Iceland">
                                                                <option value="India">
                                                                <option value="Indonesia">
                                                                <option value="Iran, Islamic Republic of">
                                                                <option value="Iraq">
                                                                <option value="Ireland">
                                                                <option value="Isle of Man">
                                                                <option value="Israel">
                                                                <option value="Italy">
                                                                <option value="Jamaica">
                                                                <option value="Japan">
                                                                <option value="Jersey">
                                                                <option value="Jordan">
                                                                <option value="Kazakhstan">
                                                                <option value="Kenya">
                                                                <option value="Kiribati">
                                                                <option value="Korea, Democratic Peoples Republic of">
                                                                <option value="Korea, Republic of">
                                                                <option value="Kuwait">
                                                                <option value="Kyrgyzstan">
                                                                <option value="Lao Peoples Democratic Republic">
                                                                <option value="Latvia">
                                                                <option value="Lebanon">
                                                                <option value="Lesotho">
                                                                <option value="Liberia">
                                                                <option value="Libyan Arab Jamahiriya">
                                                                <option value="Liechtenstein">
                                                                <option value="Lithuania">
                                                                <option value="Luxembourg">
                                                                <option value="Macao">
                                                                <option value="Macedonia, The Former Yugoslav Republic of">
                                                                <option value="Madagascar">
                                                                <option value="Malawi">
                                                                <option value="Malaysia">
                                                                <option value="Maldives">
                                                                <option value="Mali">
                                                                <option value="Malta">
                                                                <option value="Marshall Islands">
                                                                <option value="Martinique">
                                                                <option value="Mauritania">
                                                                <option value="Mauritius">
                                                                <option value="Mayotte">
                                                                <option value="Mexico">
                                                                <option value="Micronesia, Federated States of">
                                                                <option value="Moldova, Republic of">
                                                                <option value="Monaco">
                                                                <option value="Mongolia">
                                                                <option value="Montenegro">
                                                                <option value="Montserrat">
                                                                <option value="Morocco">
                                                                <option value="Mozambique">
                                                                <option value="Myanmar">
                                                                <option value="Namibia">
                                                                <option value="Nauru">
                                                                <option value="Nepal">
                                                                <option value="Netherlands">
                                                                <option value="Netherlands Antilles">
                                                                <option value="New Caledonia">
                                                                <option value="New Zealand">
                                                                <option value="Nicaragua">
                                                                <option value="Niger">
                                                                <option value="Nigeria">
                                                                <option value="Niue">
                                                                <option value="Norfolk Island">
                                                                <option value="Northern Mariana Islands">
                                                                <option value="Norway">
                                                                <option value="Oman">
                                                                <option value="Pakistan">
                                                                <option value="Palau">
                                                                <option value="Palestinian Territory, Occupied">
                                                                <option value="Panama">
                                                                <option value="Papua New Guinea">
                                                                <option value="Paraguay">
                                                                <option value="Peru">
                                                                <option value="Philippines">
                                                                <option value="Pitcairn">
                                                                <option value="Poland">
                                                                <option value="Portugal">
                                                                <option value="Puerto Rico">
                                                                <option value="Qatar">
                                                                <option value="Reunion">
                                                                <option value="Romania">
                                                                <option value="Russian Federation">
                                                                <option value="Rwanda">
                                                                <option value="Saint Helena">
                                                                <option value="Saint Kitts and Nevis">
                                                                <option value="Saint Lucia">
                                                                <option value="Saint Pierre and Miquelon">
                                                                <option value="Saint Vincent and The Grenadines">
                                                                <option value="Samoa">
                                                                <option value="San Marino">
                                                                <option value="Sao Tome and Principe">
                                                                <option value="Saudi Arabia">
                                                                <option value="Senegal">
                                                                <option value="Serbia">
                                                                <option value="Seychelles">
                                                                <option value="Sierra Leone">
                                                                <option value="Singapore">
                                                                <option value="Slovakia">
                                                                <option value="Slovenia">
                                                                <option value="Solomon Islands">
                                                                <option value="Somalia">
                                                                <option value="South Africa">
                                                                <option value="South Georgia and The South Sandwich Islands">
                                                                <option value="Spain">
                                                                <option value="Sri Lanka">
                                                                <option value="Sudan">
                                                                <option value="Suriname">
                                                                <option value="Svalbard and Jan Mayen">
                                                                <option value="Swaziland">
                                                                <option value="Sweden">
                                                                <option value="Switzerland">
                                                                <option value="Syrian Arab Republic">
                                                                <option value="Taiwan, Province of China">
                                                                <option value="Tajikistan">
                                                                <option value="Tanzania, United Republic of">
                                                                <option value="Thailand">
                                                                <option value="Timor-leste">
                                                                <option value="Togo">
                                                                <option value="Tokelau">
                                                                <option value="Tonga">
                                                                <option value="Trinidad and Tobago">
                                                                <option value="Tunisia">
                                                                <option value="Turkey">
                                                                <option value="Turkmenistan">
                                                                <option value="Turks and Caicos Islands">
                                                                <option value="Tuvalu">
                                                                <option value="Uganda">
                                                                <option value="Ukraine">
                                                                <option value="United Arab Emirates">
                                                                <option value="United Kingdom">
                                                                <option value="United States">
                                                                <option value="United States Minor Outlying Islands">
                                                                <option value="Uruguay">
                                                                <option value="Uzbekistan">
                                                                <option value="Vanuatu">
                                                                <option value="Venezuela">
                                                                <option value="Viet Nam">
                                                                <option value="Virgin Islands, British">
                                                                <option value="Virgin Islands, U.S.">
                                                                <option value="Wallis and Futuna">
                                                                <option value="Western Sahara">
                                                                <option value="Yemen">
                                                                <option value="Zambia">
                                                                <option value="Zimbabwe">

                                                            </datalist>
                                                        </td>
                                                    </tr>
                                                    


                                                    <tr>
                                                        <td style="font-weight: bold;">Data de nascimento</td>

                                                        <td>
                                                            <input class="form-control input-md" type="date" name="birthdate" value="<?php if(isset($res)){ echo $res['birthdate'];}?>" required >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Género</td>

                                                        <td>

                                                        <input id="gender_male" value="Masculino" type="radio" name="gender"  <?php if(isset($res)){ if ($res['gender'] == "Masculino") echo"checked";}?>> <label for="gender_male"> Masculino</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="gender_female" value="Feminino" type="radio" name="gender"  <?php if(isset($res)){if ($res['gender'] != "Masculino") echo"checked";}?> > <label for="gender_female"> Feminino</label>

                                                        
                                                     </td>
                                                 </tr>


                                                 <tr>
                                                    <td style="font-weight: bold;">Estado Cívil</td>

                                                    <td>
                                                        <input class="form-control" type="text" name="civil_status" value="<?php if(isset($res)){ echo $res['civil_status'];}?>" list="cvs" required>
                                                        <datalist id="cvs">

                                                            <option value="Noivado(a)">
                                                            <option value="Casado(a)">
                                                            <option value="Solteiro(a)">
                                                            <option value="Numa relação">
                                                            <option value="Separado(a)">
                                                            <option value="Divorciado(a)">
                                                            <option value="Viúvo(a)">

                                                        </datalist>
                                                 </td>
                                             </tr>


                                             <tr>
                                                <td style="font-weight: bold;">Data de Emissão de BI: </td>

                                                <td>
                                                 <input class="form-control input-md" type="date" name="bi_emission_date" value="<?php if(isset($res)){ echo $res['bi_emission_date'];}?>" required>
                                             </td>
                                         </tr>

                                         <tr>

                                            <td colspan="2" style="font-weight: bold;"></td>

                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Banco</td>
                                            <td>
                                                <input type="text" name="bank" maxlength="40" placeholder="Seu Banco" class="form-control"  list="bank" value="<?php if(isset($res)){ echo $res['bank'];}?>" required>

                                                <datalist id="bank">
                                                    <option value="BAI"></option>
                                                    <option value="BIC"></option>
                                                    <option value="BPC"></option>
                                                    <option value="BFA"></option>

                                                </datalist>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-weight: bold;">Número da Conta</td>
                                            <td>
                                                <input type="text" name="u_count" maxlength="40" placeholder="0000 0000 0000 00" value="<?php if(isset($res)){ echo $res['bank_count_number'];}?>" class="form-control" required>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-weight: bold;">IBAN</td>
                                            <td>
                                                <input type="text" name="iban" placeholder="0000 0000 0000 0000 0000 0000 0" value="<?php if(isset($res)){ echo $res['bank_iban'];}?>" class="form-control" required>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td colspan="2" style="font-weight: bold;"></td>

                                        </tr>
                                    </td>
                                </tr>
                                    
                                <tr align="center">
                                    <td colspan="2">
                                        <input id="signup_pensioner" type="submit" class="btn btn-info" style="width: 206px; background-color:#50da70; padding: 10px;" value="<?php
                                            if(isset($res)){
                                                echo "ACTUALIZAR  - PENSIONISTA";
                                                
                                                }else
                                                {
                                                    echo 'CADASTRAR PENSIONISTA    ';
                                                    ?>"onclick='collect_data(event)'<?php
                                                }
                                            ?>>
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
            
            <form method="POST" class="search_form" action="">

                 <label><h4 style="font-size:11pt;">Procura alguém</h4> </label>&nbsp;<input style="padding: 10px;margin: 10px;width: 56%;min-width: 20%; border-radius: 5px;border: solid 1px grey;" type="text" name="pesquisa" id="pesquisa" placeholder="Search friend"/><!--<button  class="fa fa-search btn btn-secondary" style="width: 10%; padding: 7px; cursor: pointer;background-color: #007bff;color: white;" type="submit" name="search_btn" ></button>-->
                
                <!--<label><h4 style="font-size:11pt;">Procura alguém</h4> </label>&nbsp;<input style="padding: 10px;margin: 10px;width: 56%;min-width: 20%; border-radius: 5px;border: solid 1px grey;" type="text" name="search_query" id="query" placeholder="Search friend"/><button  class="fa fa-search btn btn-secondary" style="width: 10%; padding: 7px; cursor: pointer;background-color: #007bff;color: white;" type="submit" name="search_btn" ></button> -->
            </form>
        
            <div style="text-align: center;">

                <div class="resultado">
        
                </div>
               <!--<?php 
               //$DB->search_user();?>-->
                 
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


