<?php


$info = (object)[];
$data = false;
$data['userid'] = $DB->generate_id();
$data['date'] = date("y-m-d H:i:s");
$data['password'] = get_random_password(8);
$data['id_operador'] = $_SESSION['userid'];

//validasr email
$data['email'] = $DATA_OBJ->email;
if (empty($DATA_OBJ->email)) 
{
	$Error .= "Entre com um email válido.<br>";
}
else
{
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $DATA_OBJ->email)) 
	{
		$Error .= "Entre com email válido.<br>";

	}
}

//validasr email
$data['u_phone'] = $DATA_OBJ->u_phone;
if (empty($DATA_OBJ->u_phone)) 
{
	$Error .= "Entre com um número de telefone válido.<br>";
}
else
{
	if (strlen($DATA_OBJ->u_phone) < 5) 
	{
		$Error .= "Número de telefone deve conter mais de  5 caracteres.<br>";
	}
}

//validar username
$data['username'] = $DATA_OBJ->username;
if(empty($DATA_OBJ->username))
{
	$Error .= "Porfavor entre com um nome válido.<br>";
}
else
{
	if(strlen($DATA_OBJ->username) < 3)
	{
		$Error .= "Nome deve conter mais de 3 caracteres.<br>";
	}
	if (!preg_match("/^[a-z A-Z]*$/", $DATA_OBJ->username)) 
	{
		$Error .= "Entra com um nome válido.<br>";
	}
}

//validar father_username
$data['father_name'] = $DATA_OBJ->father_name;
if(empty($DATA_OBJ->father_name))
{
	$Error .= "Porfavor entre com um nome do pai válido.<br>";
}
else
{
	if(strlen($DATA_OBJ->father_name) < 3)
	{
		$Error .= "Nome deve conter mais de 3 caracteres.<br>";
	}
	if (!preg_match("/^[a-z A-Z]*$/", $DATA_OBJ->father_name)) 
	{
		$Error .= "Entra com um nome do pai válido.<br>";
	}
}

//validar mother_name
$data['mother_name'] = $DATA_OBJ->mother_name;
if(empty($DATA_OBJ->mother_name))
{
	$Error .= "Porfavor entre com um nome da mãe válido.<br>";
}
else
{
	if(strlen($DATA_OBJ->mother_name) < 3)
	{
		$Error .= "Nome deve conter mais de 3 caracteres.<br>";
	}
	if (!preg_match("/^[a-z A-Z]*$/", $DATA_OBJ->mother_name)) 
	{
		$Error .= "Entra com um nome da mãe válido.<br>";
	}
}


//validate gender
$data['gender'] = isset($DATA_OBJ->gender) ? $DATA_OBJ->gender : null; //the condition
if (empty($DATA_OBJ->gender)) 
{
	$Error .= "Porfavor seleccione um género.<br>";
}
else
{
	if ($DATA_OBJ->gender != "Masculino" && $DATA_OBJ->gender != "Feminino") //Female and Male are the values
	{
		$Error .= "Porfavor seleccione um género válido.<br>";

	}
}

//validar bi_number
$data['bi_number'] = $DATA_OBJ->bi_number;
if (empty($DATA_OBJ->bi_number)) 
{
	$Error .= "Entre com um número de BI válida.<br>";
}
else if (strlen($DATA_OBJ->bi_number) < 8) 
{
	$Error .= "Número de BI deve conter mais de  8 caracteres.<br>";
}


//validar residence
$data['residence'] = $DATA_OBJ->residence;
if(empty($DATA_OBJ->residence))
{
	$Error .= "Porfavor entre com uma residência válida.<br>";
}

//validar naturality
$data['naturality'] = $DATA_OBJ->naturality;
if(empty($DATA_OBJ->naturality))
{
	$Error .= "Porfavor entre com uma naturalidade válida<br>";
}

//validar province
$data['province'] = $DATA_OBJ->province;
if(empty($DATA_OBJ->province))
{
	$Error .= "Porfavor entre com uma província válida<br>";
}

//validar country
$data['country'] = $DATA_OBJ->country;
if(empty($DATA_OBJ->country))
{
	$Error .= "Porfavor entre com um país válida<br>";
}

//validar birthdate
$data['birthdate'] = $DATA_OBJ->birthdate;
if(empty($DATA_OBJ->birthdate))
{
	$Error .= "Porfavor entre com uma data de nascimento válido<br>";
}

//validar civilstatus
$data['civil_status'] = $DATA_OBJ->civil_status;
if(empty($DATA_OBJ->civil_status))
{
	$Error .= "Porfavor entre com um estado cívil válido<br>";
}

//validar bi_emission_date
$data['bi_emission_date'] = $DATA_OBJ->bi_emission_date;
if(empty($DATA_OBJ->bi_emission_date))
{
	$Error .= "Porfavor entre com uma data de emissão de BI válido<br>";
}

//validar bank
$data['bank'] = $DATA_OBJ->bank;
if (empty($DATA_OBJ->bank)) 
{
	$Error .= "Entre com um nome de Banco válido.<br>";
}

//validar u_count
$data['u_count'] = $DATA_OBJ->u_count;
if (empty($DATA_OBJ->u_count)) 
{
	$Error .= "Entre com um número de conta do Banco válido.<br>";

}else if (strlen($DATA_OBJ->u_count) < 12) 
{
	$Error .= "Número de Conta inválido.<br>";
}

//validar iban
$data['iban'] = $DATA_OBJ->iban;
if (empty($DATA_OBJ->iban)) 
{
	$Error .= "Entre com um número de IBAN do Banco válido.<br>";
	
}else if (strlen($DATA_OBJ->iban) < 25) 
{
	$Error .= "Número do IBAN inválido.<br>";
}


//verficar antes se já existe um email cadastrado
$email = $data['email'];
$chequing = $DB->read("SELECT * FROM pensioner where email = '$email'", []);

if ($chequing) 
{
	$Error .= "O email já se encontra cadastrado!";
}

if ($Error == "") 
{

	$query = "INSERT INTO pensioner(userid,id_operador,username,email,password,telefone, gender, full_name, father_name, mother_name, bi_number, residence, naturalness, province, country, birthdate, civil_status, bi_emission_date, bank, bank_count_number, bank_iban, date) values(:userid,:id_operador,:username,:email,:password,:u_phone,:gender, :username, :father_name, :mother_name, :bi_number, :residence, :naturality, :province, :country, :birthdate, :civil_status, :bi_emission_date, :bank, :u_count, :iban, :date)";


	$result = $DB->write($query,$data);

	if ($result) 
	{
		$info->message = "A conta do pensionista foi criada!";
		$info->data_type = "info";
		echo json_encode($info);
	}
	else
	{
		$info->message = "A conta pensionista não foi criada devido algum erro!";
		$info->data_type = "erro";
		echo json_encode($info);
	}
	
}
else
{
	$info->message = $Error;
	$info->data_type = "erro";
	echo json_encode($info);
}




//gerar aleatoriamnete password
function get_random_password($length)
{
	$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

	$text = "";
	$max = 30;
	//$length = rand(4,$length);   //$length acumula valores aleeatorios de 4 ate o valor da var length

	for ($i=0; $i < $length; $i++) { 
		
		$random = rand(0,$max);
		
		$text .= $array[$random];
	}

	return $text;
}


