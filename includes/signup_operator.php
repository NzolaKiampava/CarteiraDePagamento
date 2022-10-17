<?php


$info = (object)[];
$data = false;
$data['userid'] = $DB->generate_id();
$data['date'] = date("y-m-d H:i:s");
$data['password'] = get_random_password(8);


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


//validate gender
$data['gender'] = isset($DATA_OBJ->gender) ? $DATA_OBJ->gender : null; //the condition
if (empty($DATA_OBJ->gender)) 
{
	$Error .= "Porfavor seleccione um género.<br>";
}
else
{
	if ($DATA_OBJ->gender != "Male" && $DATA_OBJ->gender != "Female") //Female and Male are the values
	{
		$Error .= "Porfavor seleccione um género válido.<br>";

	}
}


//verficar antes se já existe um email cadastrado
$email = $data['email'];
$chequing = $DB->read("SELECT * FROM users where email = '$email'", []);

if ($chequing) 
{
	$Error .= "O email já se encontra cadastrado!";
}

if ($Error == "") 
{
	
	$query = "INSERT INTO users(userid,username,email,gender,password,date) values(:userid,:username,:email,:gender,:password,:date)";


	$result = $DB->write($query,$data);

	if ($result) 
	{
		$info->message = "A conta do operador foi criada!";
		$info->data_type = "info";
		echo json_encode($info);
	}
	else
	{
		$info->message = "A conta do operador não foi criada devido algum erro!";
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

	//$length = rand(4,$length);   //$length acumula valores aleeatorios de 4 ate o valor da var length

	for ($i=0; $i < $length; $i++) { 
		
		$random = rand(0,20);
		
		$text .= $array[$random];
	}

	return $text;
}


