<?php


$info = (object)[];
$data = false;
$data['userid'] = $_SESSION['userid'];


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

if (empty($DATA_OBJ->password)) 
{
	$Error .= "Entre com uma password válida.<br>";
}



if ($Error == "") 
{

	$query = "UPDATE users set username = :username, email = :email, gender = :gender, password = :password where userid = :userid limit 1"; //limit to edit only one row


	$result = $DB->write($query,$data);

	if ($result) 
	{
		$info->message = "A teu perfil foi salvo!";
		$info->data_type = "save_profile";
		echo json_encode($info);
	}
	else
	{
		$info->message = "A teu perfil não foi salvo devido algum erro!";
		$info->data_type = "save_profile";
		echo json_encode($info);
	}
}
else
{
	$info->message = $Error;
	$info->data_type = "save_profile";
	echo json_encode($info);
}