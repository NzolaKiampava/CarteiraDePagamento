<?php

$info = (object)[];
$data = false;
$data['userid'] = $DB->generate_id();
$data['date'] = date("y-m-d H:i:s");


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

//validar passwords
$data['password'] = $DATA_OBJ->password;
$password = $DATA_OBJ->password2;
if (empty($DATA_OBJ->password)) 
{
	$Error .= "Entre com uma password válida.<br>";
}
else
{
	if ($DATA_OBJ->password != $DATA_OBJ->password2) 
	{
		$Error .= "As passwords devem ser iguais.<br>";
	}
	if (strlen($DATA_OBJ->password) < 8) 
	{
		$Error .= "Password deve conter no mínimo 8 caracteres.<br>";
	}
}


if ($Error == "") 
{

	$query = "INSERT INTO users(userid,username,email,gender,password,date) values(:userid,:username,:email,:gender,:password,:date)";


	$result = $DB->write($query,$data);

	if ($result) 
	{
		$info->message = "A tua conta foi criada!";
		$info->data_type = "info";
		echo json_encode($info);
	}
	else
	{
		$info->message = "A tua conta não foi criada devido algum erro!";
		$info->data_type = "error";
		echo json_encode($info);
	}
}
else
{
	$info->message = $Error;
	$info->data_type = "error";
	echo json_encode($info);
}