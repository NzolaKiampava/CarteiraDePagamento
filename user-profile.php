
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



$sql = "select * from users where userid = :userid limit 1";
$id = $_SESSION['userid'];
$data = $DB->read($sql, ['userid'=>$id]);

if (is_array($data)) 
{

   $data = $data[0];

   //check if exist image
   $image = ($data->gender == "Male") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

   if (file_exists($data->image)) //looking for if exist some file int the collumn image
   {
        $image = $data->image;
   }


    $gender_male = "";  //initialise a string to put checked on input radio
    $gender_female = ""; //initialise a string to put checked on input radio

    //checked if gender is equal with actual user
    if ($data->gender == "Male") 
    {
        $gender_male = "checked"; //if is, gender_male recieve checked
    }else
    {
        $gender_female = "checked"; //if is not, gender_female recieve checked
    }


   echo '

   <style>

        .dragging{

            border: dashed 2px #448aff;
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

                                 <div class="row" style="background-color: white;">
                                     <div class="col-sm-2">  
                                     </div>

                                     <div class="col-sm-8">
                                        <form id="myform" method="post" enctype="multipart/form-data">
                                            <table class="table table-bordered table-hover">
                                                <tr align="center">
                                                    <td colspan="6"><h3>Edita o seu perfil</h3></td>
                                                </tr>
                                                <tr>
                                                    <tr>

                                                        <td>
                                                        <span style="font-size:11px; margin-left:9px;">Arraste e solte uma imagem para Trocar</span>
                                                        
                                                        <style="font-weight: bold;"><img ondragover="handle_drap_and_drop(event)" ondrop="handle_drap_and_drop(event)" ondragleave="handle_drap_and_drop(event)" src="'.$image.'" style="width:200px; height:200px; margin:10px;"></td>

                                                        <td>
                                                            <label for="change_image_input" id="change_image_button" style="background-color:#9b9a80; color:white; width:220px; margin-top: 25%; padding:1em; border-radius;5px; cursor: pointer; text-align:center">Trocar Imagem</label>

                                                            <input class="form-control" type="file" onchange="upload_profile_image(this.files)" id="change_image_input" style="display:none">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">Email: </td>

                                                        <td>
                                                            <input class="form-control" type="email" name="email" required value="'.$data->email.'">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">Telefone: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="u_phone" required value="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">Palavra-passe</td>

                                                        <td>
                                                            <input class="form-control" type="password" name="password" id="mypass" required value="'.$data->password.'">
                                                            <input type="checkbox" onclick="show_password()"><strong>Mostrar palavra-passe</strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" style="font-weight: bold;">Dados Biográficos</td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Nome Completo: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="username" required value="'.$data->username.'">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Nome Completo do Pai: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="" required value="">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Nome Completo da Mãe: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="" required value="">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Número de BI: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="r" required value="">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Residência: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="" required value="">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Natural de: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="" required value="">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="font-weight: bold;">Província/Estado: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="" required value="">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">País</td>

                                                        <td>
                                                            <select class="form-control" name="">

                                                                <option value="Afghanistan">Afghanistan</option>
                                                                <option value="Åland Islands">Åland Islands</option>
                                                                <option value="Albania">Albania</option>
                                                                <option value="Algeria">Algeria</option>
                                                                <option value="American Samoa">American Samoa</option>
                                                                <option value="Andorra">Andorra</option>
                                                                <option value="Angola" selected>Angola</option>
                                                                <option value="Anguilla">Anguilla</option>
                                                                <option value="Antarctica">Antarctica</option>
                                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                <option value="Argentina">Argentina</option>
                                                                <option value="Armenia">Armenia</option>
                                                                <option value="Aruba">Aruba</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Austria">Austria</option>
                                                                <option value="Azerbaijan">Azerbaijan</option>
                                                                <option value="Bahamas">Bahamas</option>
                                                                <option value="Bahrain">Bahrain</option>
                                                                <option value="Bangladesh">Bangladesh</option>
                                                                <option value="Barbados">Barbados</option>
                                                                <option value="Belarus">Belarus</option>
                                                                <option value="Belgium">Belgium</option>
                                                                <option value="Belize">Belize</option>
                                                                <option value="Benin">Benin</option>
                                                                <option value="Bermuda">Bermuda</option>
                                                                <option value="Bhutan">Bhutan</option>
                                                                <option value="Bolivia">Bolivia</option>
                                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                <option value="Botswana">Botswana</option>
                                                                <option value="Bouvet Island">Bouvet Island</option>
                                                                <option value="Brazil">Brazil</option>
                                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                <option value="Bulgaria">Bulgaria</option>
                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                <option value="Burundi">Burundi</option>
                                                                <option value="Cambodia">Cambodia</option>
                                                                <option value="Cameroon">Cameroon</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="Cape Verde">Cape Verde</option>
                                                                <option value="Cayman Islands">Cayman Islands</option>
                                                                <option value="Central African Republic">Central African Republic</option>
                                                                <option value="Chad">Chad</option>
                                                                <option value="Chile">Chile</option>
                                                                <option value="China">China</option>
                                                                <option value="Christmas Island">Christmas Island</option>
                                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                <option value="Colombia">Colombia</option>
                                                                <option value="Comoros">Comoros</option>
                                                                <option value="Congo">Congo</option>
                                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                                <option value="Cook Islands">Cook Islands</option>
                                                                <option value="Costa Rica">Costa Rica</option>
                                                                <option value="Cote Divoire">Cote Divoire</option>
                                                                <option value="Croatia">Croatia</option>
                                                                <option value="Cuba">Cuba</option>
                                                                <option value="Cyprus">Cyprus</option>
                                                                <option value="Czech Republic">Czech Republic</option>
                                                                <option value="Denmark">Denmark</option>
                                                                <option value="Djibouti">Djibouti</option>
                                                                <option value="Dominica">Dominica</option>
                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                <option value="Ecuador">Ecuador</option>
                                                                <option value="Egypt">Egypt</option>
                                                                <option value="El Salvador">El Salvador</option>
                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                <option value="Eritrea">Eritrea</option>
                                                                <option value="Estonia">Estonia</option>
                                                                <option value="Ethiopia">Ethiopia</option>
                                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                <option value="Fiji">Fiji</option>
                                                                <option value="Finland">Finland</option>
                                                                <option value="France">France</option>
                                                                <option value="French Guiana">French Guiana</option>
                                                                <option value="French Polynesia">French Polynesia</option>
                                                                <option value="French Southern Territories">French Southern Territories</option>
                                                                <option value="Gabon">Gabon</option>
                                                                <option value="Gambia">Gambia</option>
                                                                <option value="Georgia">Georgia</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Ghana">Ghana</option>
                                                                <option value="Gibraltar">Gibraltar</option>
                                                                <option value="Greece">Greece</option>
                                                                <option value="Greenland">Greenland</option>
                                                                <option value="Grenada">Grenada</option>
                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                <option value="Guam">Guam</option>
                                                                <option value="Guatemala">Guatemala</option>
                                                                <option value="Guernsey">Guernsey</option>
                                                                <option value="Guinea">Guinea</option>
                                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                                <option value="Guyana">Guyana</option>
                                                                <option value="Haiti">Haiti</option>
                                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                <option value="Honduras">Honduras</option>
                                                                <option value="Hong Kong">Hong Kong</option>
                                                                <option value="Hungary">Hungary</option>
                                                                <option value="Iceland">Iceland</option>
                                                                <option value="India">India</option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                                <option value="Iraq">Iraq</option>
                                                                <option value="Ireland">Ireland</option>
                                                                <option value="Isle of Man">Isle of Man</option>
                                                                <option value="Israel">Israel</option>
                                                                <option value="Italy">Italy</option>
                                                                <option value="Jamaica">Jamaica</option>
                                                                <option value="Japan">Japan</option>
                                                                <option value="Jersey">Jersey</option>
                                                                <option value="Jordan">Jordan</option>
                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                <option value="Kenya">Kenya</option>
                                                                <option value="Kiribati">Kiribati</option>
                                                                <option value="Korea, Democratic Peoples Republic of">Korea, Democratic Peoples Republic of</option>
                                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                                <option value="Kuwait">Kuwait</option>
                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                <option value="Lao Peoples Democratic Republic">Lao Peoples Democratic Republic</option>
                                                                <option value="Latvia">Latvia</option>
                                                                <option value="Lebanon">Lebanon</option>
                                                                <option value="Lesotho">Lesotho</option>
                                                                <option value="Liberia">Liberia</option>
                                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                <option value="Lithuania">Lithuania</option>
                                                                <option value="Luxembourg">Luxembourg</option>
                                                                <option value="Macao">Macao</option>
                                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                                <option value="Madagascar">Madagascar</option>
                                                                <option value="Malawi">Malawi</option>
                                                                <option value="Malaysia">Malaysia</option>
                                                                <option value="Maldives">Maldives</option>
                                                                <option value="Mali">Mali</option>
                                                                <option value="Malta">Malta</option>
                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                <option value="Martinique">Martinique</option>
                                                                <option value="Mauritania">Mauritania</option>
                                                                <option value="Mauritius">Mauritius</option>
                                                                <option value="Mayotte">Mayotte</option>
                                                                <option value="Mexico">Mexico</option>
                                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                <option value="Monaco">Monaco</option>
                                                                <option value="Mongolia">Mongolia</option>
                                                                <option value="Montenegro">Montenegro</option>
                                                                <option value="Montserrat">Montserrat</option>
                                                                <option value="Morocco">Morocco</option>
                                                                <option value="Mozambique">Mozambique</option>
                                                                <option value="Myanmar">Myanmar</option>
                                                                <option value="Namibia">Namibia</option>
                                                                <option value="Nauru">Nauru</option>
                                                                <option value="Nepal">Nepal</option>
                                                                <option value="Netherlands">Netherlands</option>
                                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                <option value="New Caledonia">New Caledonia</option>
                                                                <option value="New Zealand">New Zealand</option>
                                                                <option value="Nicaragua">Nicaragua</option>
                                                                <option value="Niger">Niger</option>
                                                                <option value="Nigeria">Nigeria</option>
                                                                <option value="Niue">Niue</option>
                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                <option value="Norway">Norway</option>
                                                                <option value="Oman">Oman</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Palau">Palau</option>
                                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                                <option value="Panama">Panama</option>
                                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                                <option value="Paraguay">Paraguay</option>
                                                                <option value="Peru">Peru</option>
                                                                <option value="Philippines">Philippines</option>
                                                                <option value="Pitcairn">Pitcairn</option>
                                                                <option value="Poland">Poland</option>
                                                                <option value="Portugal">Portugal</option>
                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Reunion">Reunion</option>
                                                                <option value="Romania">Romania</option>
                                                                <option value="Russian Federation">Russian Federation</option>
                                                                <option value="Rwanda">Rwanda</option>
                                                                <option value="Saint Helena">Saint Helena</option>
                                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                <option value="Saint Lucia">Saint Lucia</option>
                                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                                <option value="Samoa">Samoa</option>
                                                                <option value="San Marino">San Marino</option>
                                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Senegal">Senegal</option>
                                                                <option value="Serbia">Serbia</option>
                                                                <option value="Seychelles">Seychelles</option>
                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Slovakia">Slovakia</option>
                                                                <option value="Slovenia">Slovenia</option>
                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                <option value="Somalia">Somalia</option>
                                                                <option value="South Africa">South Africa</option>
                                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                                <option value="Spain">Spain</option>
                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                <option value="Sudan">Sudan</option>
                                                                <option value="Suriname">Suriname</option>
                                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                <option value="Swaziland">Swaziland</option>
                                                                <option value="Sweden">Sweden</option>
                                                                <option value="Switzerland">Switzerland</option>
                                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                <option value="Tajikistan">Tajikistan</option>
                                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                <option value="Thailand">Thailand</option>
                                                                <option value="Timor-leste">Timor-leste</option>
                                                                <option value="Togo">Togo</option>
                                                                <option value="Tokelau">Tokelau</option>
                                                                <option value="Tonga">Tonga</option>
                                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                <option value="Tunisia">Tunisia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                <option value="Tuvalu">Tuvalu</option>
                                                                <option value="Uganda">Uganda</option>
                                                                <option value="Ukraine">Ukraine</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>
                                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                <option value="Uruguay">Uruguay</option>
                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                <option value="Vanuatu">Vanuatu</option>
                                                                <option value="Venezuela">Venezuela</option>
                                                                <option value="Viet Nam">Viet Nam</option>
                                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                <option value="Western Sahara">Western Sahara</option>
                                                                <option value="Yemen">Yemen</option>
                                                                <option value="Zambia">Zambia</option>
                                                                <option value="Zimbabwe">Zimbabwe</option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    


                                                    <tr>
                                                        <td style="font-weight: bold;">Data de nascimento</td>

                                                        <td>
                                                            <input class="form-control input-md" type="date" name="" required value="">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Género</td>

                                                        <td>

                                                        <input id="gender_male" type="radio" name="gender" value="Male" '.$gender_male.'> <label for="gender_male"> Masculino</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="gender_female" type="radio" name="gender" value="Female" '.$gender_female.'> <label for="gender_female"> Feminino</label>

                                                        
                                                     </td>
                                                 </tr>


                                                 <tr>
                                                    <td style="font-weight: bold;">Estado Cívil</td>

                                                    <td>
                                                     <select class="form-control" name="">

                                                         <option>Noivado(a)</option>
                                                         <option>Casado(a)</option>
                                                         <option>Solteiro(a)</option>
                                                         <option>Numa relação</option>
                                                         <option>Separado(a)</option>
                                                         <option>Divorciado(a)</option>
                                                         <option>Viúvo(a)</option>

                                                     </select>
                                                 </td>
                                             </tr>


                                             <tr>
                                                <td style="font-weight: bold;">Data de Emissão de BI: </td>

                                                <td>
                                                 <input class="form-control input-md" type="date" name="" required value="">
                                             </td>
                                         </tr>

                                         <tr>

                                            <td colspan="2" style="font-weight: bold;"></td>

                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Banco</td>
                                            <td>
                                                <input type="text" name="" maxlength="40" placeholder="Seu Banco" class="form-control" list="bank">

                                                <datalist id="bank">
                                                    <option value="BAI"></option>
                                                    <option value="BIC"></option>
                                                    <option value="BPC"></option>
                                                    <option value="BFA"></option>

                                                </datalist>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-weight: bold;">Conta</td>
                                            <td>
                                                <input type="text" name="u_count" maxlength="40" placeholder="Sua Conta" class="form-control">

                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-weight: bold;">IBAN</td>
                                            <td>
                                                <input type="text" name=""placeholder="Seu IBAN" class="form-control">

                                            </td>
                                        </tr>

                                        <tr>

                                            <td colspan="2" style="font-weight: bold;"></td>

                                        </tr>
                                        <!-- recover password option-->
                                        <tr>
                                            <td style="font-weight: bold;">Esqueci a palavra-passe</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color:#6daeeffa; color:white;">
                                                  Turn On
                                              </button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="recove-password.php" method="post" id="f">
                                                            <strong>What is your best friend name?</strong>
                                                            <textarea class="form-control" cols="83" rows="4" name="content" placeholder="Someone"></textarea><br>
                                                            <input class="btn btn-default" type="submit" name="sub" value="submit" style="width: 100px;"><br><br>
                                                            <p>Answer the above question we will ask this question if you forgot your <br>password.</p><br><br>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr align="center">
                                    <td colspan="2">
                                        <input id="save_settings_button" type="submit" class="btn btn-info" name="update" style="width: 230px; background-color:#50da70;" value="Salvar Aterações" onclick="collect_data(event)">
                                    </td>
                                </tr>
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

    function collect_data(){
        
        var save_settings_button = _("save_settings_button");
        save_settings_button.disabled = true;
        save_settings_button.value = "Carregando.....";

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

                case "gender":
                    if(inputs[i].checked){
                        data.gender = inputs[i].value;  
                    }
                    break; 

            }
        }
        send_data(data,"save_profile");
    }

    function send_data(data, type){

        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if (xml.readyState == 4 || xml.status == 200) {

                handle_result(xml.responseText);
                var save_settings_button = _("save_settings_button");
                save_settings_button.disabled = false;
                save_settings_button.value = "Salvar Aterações";
   
            }
        }

        data.data_type = type;
        var data_string = JSON.stringify(data);  //convertendo para string a data a ser enviado

        xml.open("POST", "API.php", true);
        xml.send(data_string);
    }

    function upload_profile_image(files){ //files is an array

        var change_image_button = _("change_image_button");
        change_image_button.disabled = false;
        change_image_button.innerHTML = "Actualizando Imagem...";

        var myform = new FormData();  //declarating a new FormData object

        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if (xml.readyState == 4 || xml.status == 200) {

                //alert(xml.responseText);
                get_data({}, "user_info"); //refreshing the user_info
                window.location = "user-profile.php";
                change_image_button.disabled = false;
                change_image_button.innerHTML = "Trocar Imagem";
   
            }
        }

        myform.append("files", files[0]); //appending files which files[0]
        myform.append("data_type", "change_profile_image"); //appending data_type which is Change im....

        xml.open("POST", "uploader.php", true);
        xml.send(myform);

    }

    function handle_drap_and_drop(e){  //dragging, drop and leave image

        if(e.type == "dragover"){

            e.preventDefault();  //prevenir o comportamento padrao de sustituir a imagem na pagina
            e.target.className = "dragging";

        }

        else if(e.type == "dragleave"){

            e.target.className = "";

        }

        else if(e.type == "drop"){

            e.preventDefault();  //prevenir o comportamento padrao de sustituir a imagem na pagina
            e.target.className = "";
            //console.log(e.dataTransfer.files);
            upload_profile_image(e.dataTransfer.files); //calling the function to upload the image

        }
    }

    
</script>

';
}







